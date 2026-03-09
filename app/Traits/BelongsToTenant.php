<?php

namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;

trait BelongsToTenant
{
    /**
     * Boot the BelongsToTenant trait for a model.
     *
     * @return void
     */
    protected static function bootBelongsToTenant()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            if (Tenant::checkCurrent()) {
                $builder->where('tenant_id', Tenant::current()->id);
            }
        });

        static::creating(function ($model) {
            if (Tenant::checkCurrent() && !$model->tenant_id) {
                $model->tenant_id = Tenant::current()->id;
            }
        });
    }

    /**
     * Get the tenant that owns the model.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
