using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BaseConsoleGame.Abstract.Model
{
    class Weapon : InventoryItem
    {
        Boolean bRanged;
        int range;
        Ammo[] ammo;
    }
}
