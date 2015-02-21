using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.Model
{
    class SuperBat : Abstract.Model.Actor
    {
        private int numRooms;
        Random random = new Random();
        public SuperBat(int numRooms)
        {
            warningText = "Bats nearby";
            actionText = "Zap--Super Bat snatch! Elsewhereville for you!";
            this.numRooms = numRooms;
        }
        
        override public string action(Abstract.Model.Pawn pawn)
        {
            pawn.location = random.Next(numRooms);
            return actionText;
        }
    }
}
