<?php

namespace App\States\OrderProduction;

class Printing extends ProductionState
{
    public static $name = 'printing';

    public function color(): string
    {
        return 'orange';
    }
}
