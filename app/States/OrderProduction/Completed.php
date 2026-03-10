<?php

namespace App\States\OrderProduction;

class Completed extends ProductionState
{
    public static $name = 'completed';

    public function color(): string
    {
        return 'teal';
    }
}
