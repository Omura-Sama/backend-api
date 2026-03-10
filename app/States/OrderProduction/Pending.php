<?php

namespace App\States\OrderProduction;

class Pending extends ProductionState
{
    public static $name = 'pending';

    public function color(): string
    {
        return 'gray';
    }
}
