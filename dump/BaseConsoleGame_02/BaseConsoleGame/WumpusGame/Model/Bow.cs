using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.Model
{
    class Bow : Abstract.Model.Weapon
    {
        public int numArrows;
        public int RANGE = 5;

        public Bow(int numArrows)
        {            
            this.numArrows = numArrows;
        }

    }
}
