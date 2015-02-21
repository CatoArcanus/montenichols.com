using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.Abstract.Model
{
    abstract class Pawn : Actor
    {
        protected Boolean bAlive;
        protected Inventory inventory;

        public Pawn()
        {
            bAlive = true;
        }
        
        public abstract void move(NavPoint n);
        
        public void kill()
        {
            bAlive = false;
        }

        public void ressurect()
        {
            bAlive = true;
        }

        public Boolean isAlive()
        {
            return bAlive;
        }

        public Boolean isDead()
        {
            return !bAlive;
        }
    }
}
