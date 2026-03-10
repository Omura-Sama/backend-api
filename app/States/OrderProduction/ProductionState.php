<?php

namespace App\States\OrderProduction;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class ProductionState extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Editing::class)
            ->allowTransition(Pending::class, Printing::class) // Can skip editing if just print
            ->allowTransition(Editing::class, ClientReview::class)
            ->allowTransition(ClientReview::class, Editing::class) // Revision
            ->allowTransition(ClientReview::class, Printing::class)
            ->allowTransition(Editing::class, Printing::class) // Auto-approved
            ->allowTransition(Printing::class, ReadyForPickup::class)
            ->allowTransition(ReadyForPickup::class, Completed::class);
    }
}
