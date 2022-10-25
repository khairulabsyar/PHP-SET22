<?php

function printGrid(int $size): string {
    $string = "";
    for($i = 0; $i < $size; $i++ ){
        if ($i % 2 === 0){
            $string .= " ";
        }
        for ($x = 0; $x < $size; $x++ ){
            $x % 2 === 1 ? $string .= " " :$string .= "#";
        }
        $string .= "\n";
    }
    return $string;
};