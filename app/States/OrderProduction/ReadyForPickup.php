<?php

namespace App\States\OrderProduction;

class ReadyForPickup extends ProductionState
{
    public static $name = 'ready_for_pickup';

    public function color(): string
    {
        return 'green';
    }
}
