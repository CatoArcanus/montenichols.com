using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame
{
    class Program
    {
        static void Main(string[] args)
        {
            //Variables
            String my_input = "";
            Boolean isOver = false;
    
            //Game Classes
            WumpusGame.Controller.WumpusEngine gameEngine = new WumpusGame.Controller.WumpusEngine();
            gameEngine.Draw();
            while (!isOver)
            {
                isOver = gameEngine.Update();
                gameEngine.Draw();                
            }
        }
    }
}
