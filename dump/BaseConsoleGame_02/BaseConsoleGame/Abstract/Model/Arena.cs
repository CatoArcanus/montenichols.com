using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.Abstract.Model
{
    abstract class Arena
    {
        public NavPoint[] navPoints;
        abstract protected void setNavPoints();       
    }
}
