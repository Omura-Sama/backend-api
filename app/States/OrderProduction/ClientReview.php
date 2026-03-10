<?php

namespace App\States\OrderProduction;

class ClientReview extends ProductionState
{
    public static $name = 'client_review';

    public function color(): string
    {
        return 'yellow';
    }
}
