using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.Model
{
    class Player : Abstract.Model.Pawn
    {
        public string abilities = "Shoot, Move or Quit (S-M-Q)";
        public int sight = 1;
        public int numArrows = 5;
        public WumpusGame.Model.Bow bow;

        public Player() 
        {
            bow = new WumpusGame.Model.Bow(numArrows); 
        }

        override public void move(Abstract.Model.NavPoint n)
        {
            //TODO: movement logic    
        }
        override public string action(Abstract.Model.Pawn pawn)
        {
            bow = new WumpusGame.Model.Bow(numArrows);
            return actionText;
        }
    }
}
