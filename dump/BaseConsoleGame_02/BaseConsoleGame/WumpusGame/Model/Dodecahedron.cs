using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;


namespace BaseConsoleGame.WumpusGame.Model
{
    class Dodecahedron : Abstract.Model.Arena
    {
        public static int NUM_ROOMS = 20;
        public static int NUM_EXITS = 3;
        
        public int[] randomRooms;
        public int nextRoom = 0;
        //Player player;
        //public Wumpus[] wumpi;
        //public Pit[] pits;
        //public SuperBat[] superBats;

        Random random = new Random();      

        public Dodecahedron()
        {
            setNavPoints();
            //set random room listing
            setRandomListOfRooms();
        }
        
        override protected void setNavPoints()
        {
            navPoints = new Room[NUM_ROOMS];
            
            //set random room listing
            setRandomListOfRooms();

            //set up all the rooms
            for (int i = 0; i < NUM_ROOMS; i++)
            {
                navPoints[i] = new Room(NUM_EXITS);
                navPoints[i].setRealLocation(i);
            }

            //assign room IDs
            for (int i = 0; i < NUM_ROOMS; i++)
            {
                navPoints[i].setID(randomRooms[i]);
            }
            
            //make a 10 room chain
            for (int i = 0; i < 10; i++)
            {
                //make an inner 10 room chain
                if ((i + 1) < 10)
                {
                    navPoints[i].addExit(i + 1);
                    navPoints[i + 1].addExit(i);
                }

                //attach each element to one border element
                navPoints[i].addExit(i + 10);
                navPoints[i+10].addExit(i);

                //attach each border element to it's neighbor
                if ((i + 10 + 2) < 20)
                {
                    navPoints[i + 10].addExit((i + 10) + 2);
                    navPoints[(i + 10) + 2].addExit(i + 10);
                }
            }
            //Hard connect the edge cases
            navPoints[9].addExit(0);
            navPoints[0].addExit(9);
            navPoints[19].addExit(11);
            navPoints[11].addExit(19);
            navPoints[18].addExit(10);
            navPoints[10].addExit(18);            
        }

        public void setRandomListOfRooms()
        {
            randomRooms = new int[NUM_ROOMS];
            //create rooms
            for (int i = 0; i < NUM_ROOMS; i++)
            {
                //navPoints[i] = new Room(NUM_EXITS);
                randomRooms[i] = i;
            }

            //shuffle room ids            
            for (int i = NUM_ROOMS - 1; i > 0; i--)
            {
                int n = random.Next(i + 1);
                int temp = randomRooms[i];
                randomRooms[i] = randomRooms[n];
                randomRooms[n] = temp;
            }

            //set pointer
            nextRoom = 0;
        }

        public void placeActor(Abstract.Model.Actor actor)
        {
            actor.location = randomRooms[nextRoom];            
            nextRoom++;            
        }

        public void placeActors(Abstract.Model.Actor[] actors) 
        {
            for (int i = 0; i < actors.Length; i++)
            {
                actors[i].location = randomRooms[nextRoom];
                nextRoom++;
            }            
        }

        public void placeActors(List<Abstract.Model.Actor> actors)
        {
            for (int i = 0; i < actors.Count; i++)
            {
                actors[i].location = randomRooms[nextRoom];
                nextRoom++;
            } 
        }

        public void toString() {
            for (int i = 0; i < NUM_ROOMS; i++)
            {
                System.Console.Write(navPoints[i].getID() + " exits: ");
                for (int j = 0; j < NUM_EXITS; j++)
                {
                    int k = navPoints[i].adjacentNavPointIDs[j];                   
                    //System.Console.Write(navPoints[i].adjacentNavPointIDs[j] + " ");
                    System.Console.Write(navPoints[k].getID() + " ");
                }
                System.Console.Write("\n");
            }
        }        
    }
}
