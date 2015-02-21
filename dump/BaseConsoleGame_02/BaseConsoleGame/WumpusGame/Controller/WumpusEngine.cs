using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.Controller
{
    class WumpusEngine : Abstract.Controller.Engine
    {
        //Constants
        int NUM_WUMPI = 1;
        int NUM_SUPER_BATS = 1;
        int NUM_PITS = 2;
        Boolean DEBUG = false;
        
        //Models
        WumpusGame.Model.Dodecahedron map;
        WumpusGame.Model.Player player;
        WumpusGame.Model.Wumpus[] wumpi;
        WumpusGame.Model.Pit[] pits;
        WumpusGame.Model.SuperBat[] superBats;
        List<Abstract.Model.Actor> actors = new List<Abstract.Model.Actor>();
        
        //Views
        private WumpusGame.View.WumpusConsoleView renderer;

        //Controllers
        private WumpusInputController inputController;

        //Variables
        Boolean valid = true;
        Boolean makeActorsRandom = true;

        public WumpusEngine()
        {
            //System.Console.WriteLine("Construct...");
            
            //set up models
            map = new WumpusGame.Model.Dodecahedron();
            player = new WumpusGame.Model.Player();
            wumpi = new WumpusGame.Model.Wumpus[NUM_WUMPI];
            pits = new WumpusGame.Model.Pit[NUM_PITS];
            superBats = new WumpusGame.Model.SuperBat[NUM_SUPER_BATS];
            actors.Add(player);
            for (int i = 0; i < NUM_WUMPI; i++)
            {
               wumpi[i] = new WumpusGame.Model.Wumpus(false);
               actors.Add(wumpi[i]);
            }

            for (int i = 0; i < NUM_PITS; i++)
            {
                pits[i] = new WumpusGame.Model.Pit();
                actors.Add(pits[i]);
            }

            for (int i = 0; i < NUM_SUPER_BATS; i++)
            {
                superBats[i] = new WumpusGame.Model.SuperBat(map.navPoints.Length);
                actors.Add(superBats[i]);
            }

            // set up consoleRenderer (view)
            renderer = new WumpusGame.View.WumpusConsoleView();
            
            // setup controller 
            inputController = new WumpusInputController();
            
            Initialize();
        }

        /// <summary>
        /// Allows the game to perform any initialization it needs to before starting to run.
        /// This is where it can query for any required services and load any non-graphic
        /// related content.  Calling base.Initialize will enumerate through any components
        /// and initialize them as well.
        /// </summary>        
        override protected void Initialize()
        {
            // TODO: Add your initialization logic here
            trace("Init...");
            
            //Set up game
            //map.placeActor(player);
            //map.placeActors(wumpi);
            //map.placeActors(superBats);
            //map.placeActors(pits);
            if(makeActorsRandom)
            {
                map.setRandomListOfRooms();
            }
            else
            {
                map.nextRoom = 0;
            }
            map.placeActors(actors);
            trace("player location = " + player.location);
            player.ressurect();
            for (int i = 0; i < wumpi.Length; i++ )
            {
                wumpi[i].ressurect();
            }
            
            LoadContent();
        }

        /// <summary>
        /// LoadContent will be called once per game and is the place to load
        /// all of your content.
        /// </summary>
        override protected void LoadContent()
        {
            // Get JSON config files
            trace("GetJSON...");
        }

        /// <summary>
        /// UnloadContent will be called once per game and is the place to unload
        /// all content.
        /// </summary>
        override protected void UnloadContent()
        {
            // TODO: Unload any non ContentManager content here
        }


        override public Boolean Update()
        {
            if (inputController.getExitState())
            {           
                return true; 
            }
            if (inputController.getRenewState()) 
            { 
                makeActorsRandom = true;
                System.Console.WriteLine("**re initialixe level in a renwed state");
                inputController.setDefaultState();
                Initialize();
                Draw();
            }
            if (inputController.getResetState()) { 
                makeActorsRandom = false;
                System.Console.WriteLine("**re initialixe level in a reset state");
                inputController.setDefaultState();
                Initialize();
                Draw();
            }
            trace("update");
            String input = "";
            if (!inputController.getActionState() )//|| !inputController.getRenewState() || !inputController.getResetState() || !inputController.getQuitState())
            {
                input = System.Console.ReadLine();

                valid = inputController.validateInput(input, map.navPoints[player.location], map.navPoints, player);
                if (valid)
                {
                    inputController.update(map, actors, player, wumpi);
                }               
            }
            else
            {
                valid = inputController.validateInput(input, map.navPoints[player.location], map.navPoints, player);
            }
            return false;
        }

        /// <summary>
        /// This is called when the game should draw itself.
        /// </summary>
        /// <param name="gameTime">Provides a snapshot of timing values.</param>
        override public void Draw()
        {
            // TODO: Add your drawing code here
            trace("draw...");            
      
            if (valid)
            {
                if (inputController.getDefaultState())
                {
                    renderer.render(map, actors, player);
                }
                else
                {
                    renderer.renderError(inputController.stateMsg);
                }
            }
            else
            {
                renderer.renderError(inputController.errorMsg);
            }
        }

        private void trace(string s)
        {
            if (DEBUG)
            {
                System.Console.WriteLine(s);
            }
        }
    }
}
