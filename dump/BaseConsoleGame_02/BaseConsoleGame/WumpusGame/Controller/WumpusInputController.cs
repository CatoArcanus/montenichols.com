using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.Controller
{
    class WumpusInputController
    {
        public enum states : int { DEFAULT, MOVE, SHOOT, SHOOT_ROOM, DO_ACTION, QUIT, QUIT_CHOICE, RESET, RENEW, EXIT };
        public int state;
        public int numRoom;
        public int currentRoomNum;
        private Boolean DEBUG = true;
        public string errorMsg = "";
        public string stateMsg = "";
        private Boolean shotsFired = false;
        List<Abstract.Model.NavPoint> roomPath = new List<Abstract.Model.NavPoint>();

        Random random = new Random();

        public WumpusInputController()
        {
            state = (int) states.DEFAULT;
        }

        public void update(WumpusGame.Model.Dodecahedron map, List<Abstract.Model.Actor> actors, WumpusGame.Model.Player player, WumpusGame.Model.Wumpus[] wumpi)
        {
            //trace("player location = " + map.navPoints[player.location].getID());
            
            //if the arrow is flying, try to kill the wumpus or hit the player                
                //foreach room in room list    
                    //if hit you
                        //msg = ouch
                        //return true
                    //if hit wumpus
                        //state = WIN
                        //return true 
                    //else
                        //msg = miss
                        //return true
           
            if (shotsFired)
            {
                checkHit(player, wumpi);
                player.bow.numArrows--;
            }

            //foreach actor
            //check if it in in the same room as the player
            //if yes, actor.action(player)
            //msg = actor.actionMsg
            //return true
            for (int i = 0; i < actors.Count; i++)
            {
                if (actors[i].location == player.location && actors[i] != player)
                {
                    stateMsg = actors[i].action(player);
                    state = (int)states.DO_ACTION;
                }
            }

            int allDead = 0;
            //move actors              
            //for each wumpi in actors
            //wumpi.move
            for (int i = 0; i < wumpi.Length; i++)
            {
                wumpi[i].move(map.navPoints[wumpi[i].location]);
                if (wumpi[i].isAlive())
                {
                    allDead++;
                }
            }

            if (allDead == 0)
            {
                stateMsg += "\n\n You Won. \n\n Hee hee hee - the Wumpus'll getcha next time!!";
                state = (int)states.QUIT;
            }
            
            if (player.isDead())
            {
                //stateMsg = "You Died.";
                state = (int)states.QUIT;
            }
                
            //return false
        }

        private void checkHit(Abstract.Model.Pawn player, Abstract.Model.Pawn[] enemies)
        {
            for (int i = 1; i < roomPath.Count; i++)
            {
                if (roomPath[i].getRealLocation() == player.location)
                {
                    stateMsg = "Ouch! Arrow got you!";
                    return;
                }

                for(int j = 0; j < enemies.Length; j++)
                {
                    if (roomPath[i].getRealLocation() == enemies[j].location)
                    {
                        stateMsg = "Aha! You got a Wumpus!";
                        // kill
                        player.action(enemies[j]); 
                        return;
                    }
                }
            }
            stateMsg = "Missed!";
        }

        public Boolean validateInput(String input, Abstract.Model.NavPoint currentLocation, Abstract.Model.NavPoint[] rooms, WumpusGame.Model.Player player)
        {
            int a_number;
            switch (state)
            {
                case (int)states.DEFAULT:
                    trace("default case");
                    if (string.Compare(input, 0, "M", 0, 1, true) == 0)
                    {
                        //move
                        trace("moving");
                        stateMsg = "Where to?";
                        state = (int)states.MOVE;
                        return true;
                    }
                    if (string.Compare(input, 0, "S", 0, 1, true) == 0)
                    {
                        //shoot
                        trace("shooting");
                        stateMsg = "No. of rooms (0-5)?";
                        state = (int)states.SHOOT;
                        return true;
                    }
                    if (string.Compare(input, 0, "Q", 0, 1, true) == 0)
                    {
                        //quit
                        trace("quiting");
                        stateMsg = "\nChicken!\n\n Play again(Y-N)?";
                        state = (int)states.QUIT;
                        return true;
                    }
                    trace("bad_input");
                    return false;
                   
                case (int)states.MOVE:              
                    trace("move case");
                    //if we have a number put it into a_number
                    if (int.TryParse(input, out a_number) == true)
                    {
                        int index = -1;
                        
                        //For all the rooms, check the ID and get the actual index of the room
                        for (int i = 0; i < rooms.Length; i++)
                        {
                            if (rooms[i].getID() == a_number)
                            {
                                index = i;
                                i = Int16.MaxValue;
                            }
                        }

                        //for all the adjacent points, check the index and see if it is next to the current location
                        for (int i = 0; i < currentLocation.adjacentNavPointIDs.Length; i++)
                        {
                            if(index == currentLocation.adjacentNavPointIDs[i])
                            {
                                trace("Moving into room " + a_number);
                                player.location = index; 
                                state = (int)states.DEFAULT;
                                return true;
                            }
                        }                        
                    }
                    
                    trace("Invalid number - please enter an integer that is an adjacent room.");
                    errorMsg = "Not possible - Where to?";
                    return false;
                case (int)states.SHOOT:
                    trace("shoot case");
                    if (int.TryParse(input, out a_number) == true)
                    {
                        if (a_number > 0 && a_number <= player.bow.RANGE)
                        {
                            trace("shooting " + a_number + " rooms");
                            state = (int)states.SHOOT_ROOM;
                            //the # of rooms
                            numRoom = a_number;
                            //the current count of rooms in our path
                            currentRoomNum = 0;
                            //the room path starts with a dummy node, the player location
                            roomPath.Add(currentLocation);
                            //new state msg for entering rooms in
                            stateMsg = "Room#?";                            
                            return true;
                        }
                        if (a_number == 0)
                        {
                            trace("shooting " + a_number + " rooms");
                            state = (int)states.DEFAULT;
                            return true;
                        }                       
                    }
                    
                    trace("Invalid number - please enter an integer between [0-5].");
                    errorMsg = "Invalid number - please enter an integer between [0-5].";
                    return false;

                case (int)states.SHOOT_ROOM:
                    trace("shoot_room case");
                    if (int.TryParse(input, out a_number) == true)
                    {
                        trace("Shooting room " + a_number);
                        //FIXME: Crooked arrows!!!
                        if(!testCrooked(a_number))
                        {
                            int index = -1;

                            //For all the rooms, check the ID and get the actual index of the room
                            for (int i = 0; i < rooms.Length; i++)
                            {
                                if (rooms[i].getID() == a_number)
                                {
                                    index = i;
                                    i = Int16.MaxValue;
                                }
                            }
                            
                            //for all the adjacent points, check the index and see if it is next to the current location
                            Abstract.Model.NavPoint roomToCheck = roomPath[roomPath.Count - 1];
                            for (int i = 0; i < roomToCheck.adjacentNavPointIDs.Length; i++)
                            {
                                trace(""+ index);
                                if (index == roomToCheck.adjacentNavPointIDs[i])
                                {
                                    trace("Shooting at Room " + a_number);
                                    //the room path starts with a dummy node, the player location
                                    roomPath.Add(rooms[index]);
                                }                                
                            }
                            //Compled peice of code. Checks to see if we added that bitch, if not we get a random one and place it in there
                            if (roomPath[roomPath.Count - 1].getID() == roomToCheck.getID())
                            {
                                int n = random.Next(roomToCheck.adjacentNavPointIDs.Length);
                                int r = roomPath[roomPath.Count - 1].adjacentNavPointIDs[n];
                                trace("Shooting at RandomRoom " + rooms[r].getID());
                                roomPath.Add(rooms[r]);
                            }

                            currentRoomNum++;
                            
                            if (currentRoomNum >= numRoom)
                            {
                                shotsFired = true;
                                state = (int)states.DEFAULT;
                            }
                            return true;
                        }
                        else 
                        {
                            errorMsg = "Arrows are not that Crooked";
                            return false;
                        }                        
                    }
                    
                    trace("Invalid number - please enter an integer.");
                    errorMsg = "Bad number - try again:";
                    return false;              

                case (int)states.QUIT:
                    errorMsg = ("Would You like to play again?(Y/N)");
                    if (string.Compare(input, 0, "Y", 0, 1, true) == 0)
                    {
                        //move
                        trace("yes");
                        errorMsg = "Same Configuration(Y/N)?";
                        state = (int)states.QUIT_CHOICE;
                        return false;
                    }
                    if (string.Compare(input, 0, "N", 0, 1, true) == 0)
                    {
                        //shoot
                        trace("exit");
                        errorMsg = "Bye!";
                        state = (int)states.EXIT;
                        return false;
                    }                    
                    trace("bad_input");
                    return false;

                case (int)states.QUIT_CHOICE:
                    //stateMsg = ("Would You like to play the same configuration again?(Y/N)");
                    if (string.Compare(input, 0, "Y", 0, 1, true) == 0)
                    {
                        //move
                        trace("yes");
                        errorMsg = "It shall be the same.";
                        state = (int)states.RESET;
                        return false;
                    }
                    if (string.Compare(input, 0, "N", 0, 1, true) == 0)
                    {
                        //shoot
                        trace("exit");
                        errorMsg = "It shall be different.";
                        state = (int)states.RENEW;
                        return false;
                    }
                    trace("bad_input");
                    return false;
                
                case (int)states.DO_ACTION:
                    trace("doaction beign clled only once");
                    state = (int)states.DEFAULT;
                    return true;                   
                default:
                    trace("Something went wrong -- Default case");
                    return false;
            }                    
        }

        private bool testCrooked(int testID)
        {
            if ((roomPath.Count - 2) >= 0)
            {
                return (testID == roomPath[roomPath.Count - 2].getID());
            }
            else
            {
                return false;
            }
        }

        public Boolean getDefaultState()
        {
            return ((int)states.DEFAULT == state);
        }

        private void trace(string s)
        {
            if(DEBUG)
            {
                System.Console.WriteLine(s);
            }
        }

        internal bool getActionState()
        {
            return ((int)states.DO_ACTION == state);
        }

        internal bool getExitState()
        {
            return ((int)states.EXIT == state);
        }

        internal bool getRenewState()
        {
            return ((int)states.RENEW == state);
        }

        internal bool getResetState()
        {
            return ((int)states.RESET == state);
        }

        internal bool getQuitState()
        {
            return ((int)states.QUIT == state || (int)states.QUIT_CHOICE == state );
        }

        internal void setDefaultState()
        {
            state = (int)states.DEFAULT;
        }
    }
}
