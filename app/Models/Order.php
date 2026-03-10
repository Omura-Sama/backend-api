<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\BelongsToTenant;
use Spatie\ModelStates\HasStates;
use App\States\OrderProduction\ProductionState;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Order extends Model
{
    use BelongsToTenant, HasStates, LogsActivity;

    protected $fillable = [
        'customer_id',
        'booking_id',
        'invoice_number',
        'subtotal',
        'discount',
        'tax',
        'grand_total',
        'production_state',
        'payment_status',
        'notes'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    protected $casts = [
        'production_state' => ProductionState::class,
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
