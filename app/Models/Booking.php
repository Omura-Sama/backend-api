<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\BelongsToTenant;

class Booking extends Model
{
    use BelongsToTenant;

    protected $fillable = [
        'customer_id',
        'schedule_date',
        'schedule_time',
        'status',
        'notes'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
