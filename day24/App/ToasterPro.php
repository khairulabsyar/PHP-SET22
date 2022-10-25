<?php

namespace App;

// to do inheritence use extends
// class ToasterPro extends Toaster
// {
//     // method signature: the declaration must be the same as the parent link $size must be int
//     // public int $size; with constructor no need to declare again

//     // be careful with constructor as creating a new construct in child will replace with parent
//     // special about construct the parameter will not effect by the parent
//     public function __construct()
//     {
//         //to make parent methods logic work in child
//         parent::__construct();
//         $this->size = 4;
//         // $this->slices = [];
//     }
//     public function toastBagel()
//     {
//         foreach ($this->slices as $i => $slice) {
//             echo ($i + 1) . '. Toasting: ' . $slice . ' with bagel option' . '<br/>';
//         }
//     }
// }

class ToasterPro extends Toaster
{
    public int $size;

    public function __construct(string $x, int $y, float $z)
    {
        parent::__construct($x);
        $this->size = 5;
    }

    public function addSlice(string $slice): void
    {
        parent::addSlice($slice);
        // custom logic
    }
    public function toastBagel()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . ': Toasting ' . $slice . ' with Bagel option ' . PHP_EOL;
        }
    }
}