using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.Abstract.Model
{
    abstract class NavPoint
    {
        private int id;
        private int realLocation;
        public int exits;
        public int[] adjacentNavPointIDs;

        abstract public void addExit(int exitID);
        
        public void setID(int id)
        {
            this.id = id;
        }

        public void setRealLocation(int realLocation)
        {
            this.realLocation = realLocation;
        }

        public int getID()
        {
            return id;
        }

        public int getRealLocation()
        {
            return realLocation;
        }
    }
}
