<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Traits\BelongsToTenant;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasSlug, BelongsToTenant, InteractsWithMedia;

    protected $fillable = [
        'service_category_id',
        'name',
        'slug',
        'description',
        'price',
        'is_active',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
