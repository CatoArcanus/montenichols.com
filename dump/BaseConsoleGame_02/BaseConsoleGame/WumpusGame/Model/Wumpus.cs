using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.Model
{
    class Wumpus : Abstract.Model.Pawn
    {
        protected Boolean bAwake;
        Random random;// = new Random();  

        public Wumpus(Boolean awake)
        {
            bAwake = awake;
            random = new Random();
            warningText = "I smell a wumpus";
            actionText = "... Ooops! Bumped a Wumpus";
        }

        override public void move(Abstract.Model.NavPoint n)
        {
            if (bAwake)
            {
                int r = random.Next(n.adjacentNavPointIDs.Length);                
                if (r < n.adjacentNavPointIDs.Length - 1)
                {
                    location = n.adjacentNavPointIDs[r];
                }
                actionText = "YYYYIIIIEEEE... Wumpus at your face!\nWould You like to play again?(Y/N)";
            }
            //System.Console.WriteLine("Wumpus location = " + location);
        }

        override public string action(Abstract.Model.Pawn pawn)
        {
            if (bAwake)
            {
                pawn.kill();
            }
            else
            {
                bAwake = true;
            }
            return actionText;
        }
    }
}
