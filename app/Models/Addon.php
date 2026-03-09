<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\BelongsToTenant;

class Addon extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'name',
        'description',
        'type',
        'price',
        'is_active',
    ];
}
