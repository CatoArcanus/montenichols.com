using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.View
{
    class WumpusConsoleView : Abstract.View.ConsoleView
    {
        public WumpusConsoleView()
        {

        }

        public void renderError(string error)
        {
            System.Console.WriteLine(error);
        }

        public void render(BaseConsoleGame.Abstract.Model.Arena map, List<Abstract.Model.Actor> actors, WumpusGame.Model.Player player)
        {   

            //for each actor in the map
                //if actor is in the same room as the player
                    //render actor.action
            foreach (Abstract.Model.Actor actor in actors)
            {
                if (actor.location == player.location)
                {
                    System.Console.WriteLine(actor.actionText);
                }
            }

            //for each actor in the map
                //if actor is in an adjacent room of the player
                    //render actor.hazard
            foreach (Abstract.Model.Actor actor in actors)
            {
                for (int j = 0; j < map.navPoints[player.location].adjacentNavPointIDs.Length; j++)
                {
                    int k = map.navPoints[player.location].adjacentNavPointIDs[j];                    
                    if (actor.location == k)
                    {
                        System.Console.WriteLine(actor.warningText);
                    }
                }
            }

            //for each adjacent room
                //render mapData          
            System.Console.WriteLine("You are in room " + map.navPoints[player.location].getID());
            System.Console.Write("Tunnels lead to: ");
            for (int j = 0; j < map.navPoints[player.location].adjacentNavPointIDs.Length; j++)
            {
                int k = map.navPoints[player.location].adjacentNavPointIDs[j];
                //System.Console.Write(navPoints[i].adjacentNavPointIDs[j] + " ");
                System.Console.Write(map.navPoints[k].getID() + " ");
            }
            System.Console.Write("\n");

            //finally render PlayerAbilities
                //render player.abilities
            System.Console.Write(player.abilities);
        }
    }
}
