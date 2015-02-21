using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.Model
{
    class Pit : Abstract.Model.Actor
    {
        public Pit()
        {
            warningText = "I feel a draft.";
            actionText = "YYYIIIIEEEE . . . fell in a pit\nWould You like to play again?(Y/N)";
        }
        override public string action(Abstract.Model.Pawn pawn) 
        {
            pawn.kill();
            return actionText;
        }
    }
}
