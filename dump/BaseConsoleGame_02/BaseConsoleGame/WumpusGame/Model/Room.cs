using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.WumpusGame.Model
{
    class Room : Abstract.Model.NavPoint
    {
        uint currentExitCount;
        public Room(int numAdjacentRooms)
        {
            currentExitCount = 0;
            exits = numAdjacentRooms;
            adjacentNavPointIDs = new int[exits];
        }

        override public void addExit(int exitID)
        {
            adjacentNavPointIDs[currentExitCount] = exitID;
            currentExitCount++;
        }
    }
}
