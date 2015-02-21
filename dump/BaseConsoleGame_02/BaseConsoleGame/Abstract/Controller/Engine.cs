using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.Abstract.Controller
{
    abstract class Engine
    {
        public Engine()
        {
            //System.Console.WriteLine("Abs Construct...");            
        }
             
        abstract protected void Initialize();        
        abstract protected void LoadContent();       
        abstract protected void UnloadContent();       
        abstract public Boolean Update();      
        abstract public void Draw();       
    }
}
