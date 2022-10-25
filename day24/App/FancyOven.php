<?php

namespace App;

class FancyOven
{
    public function __construct(private ToasterPro $toasterPro)
    {
    }

    public function fry()
    {
        // fry stuff
    }

    public function toast()
    {
        $this->toasterPro->toast();
    }

    public function toastBagel()
    {
        $this->toasterPro->toastBagel();
    }
}