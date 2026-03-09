<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Traits\BelongsToTenant;

class ServiceCategory extends Model
{
    use HasSlug, BelongsToTenant;

    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
