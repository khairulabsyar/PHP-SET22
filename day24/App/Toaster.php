<?php

namespace App;

// final class Toaster to not able to be inheretence, same goes with the rest of parent's functions
// abstract class Toaster >> abstract class
// class Toaster
// {
//     public array $slices;
//     public int $size;

//     // if want to use protected, cannot print it
//     // visibility level from parent to children cannot go lower like parent (public) while child (private/protected) but it can do the opposite way parent (private/protected) while child (public)
//     // protected array $slices = [];

//     // with constructed, child will follow 
//     public function __construct()
//     {
//         $this->slices = [];
//         $this->size = 2;
//     }

//     // void to return nothing, if var_dump will provide null since function is not returning
//     // abstract public function addSlice(string $slice): void >> abstract function
//     public function addSlice(string $slice): void
//     {
//         if (count($this->slices) < $this->size) {
//             $this->slices[] = $slice;
//         }
//     }

//     public function toast()
//     {
//         foreach ($this->slices as $i => $slice) {
//             echo ($i + 1) . '. Toasting: ' . $slice . '<br/>';
//         }
//     }
// }

// ------ redo 7/9
class Toaster
{
    public array $slices;
    public int $size;

    public function __construct(string $x)
    {
        $this->slices = [];
        $this->size = 3;
    }


    public function addSlice(string $slice): void
    {
        // '$this' will display the calling object depending on whether the calling object is of class Toaster or ToasterPro, the class will show likewise
        // var_dump($this);
        if (count($this->slices) < $this->size) {
            $this->slices[] = $slice;
        }
    }

    public function toast()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . ': Toasting ' . $slice . PHP_EOL;
        }
    }
}