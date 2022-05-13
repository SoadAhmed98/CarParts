<?php

namespace App\Models;


use App\Traits\EscapeUniCodeJson;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTranslatableSlug;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model implements HasMedia
{
    use HasFactory,
    InteractsWithMedia,
    EscapeUniCodeJson,
    HasTranslations,
    HasTranslatableSlug;
    protected $fillable = ['name','status','slug'];
    public $translatable = ['name','slug']; //بحط هنا ال columns اللى عايز اترجمها
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    
}

