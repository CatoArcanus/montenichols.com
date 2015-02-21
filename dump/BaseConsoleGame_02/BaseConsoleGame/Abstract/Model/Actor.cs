using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.Abstract.Model
{
    abstract class Actor
    {
        public int location;
        public string warningText = "";
        public string actionText = "";

        public abstract string action(Pawn pawn);
    }
}
