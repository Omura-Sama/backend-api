<?php

namespace App\States\OrderProduction;

class Editing extends ProductionState
{
    public static $name = 'editing';

    public function color(): string
    {
        return 'blue';
    }
}
