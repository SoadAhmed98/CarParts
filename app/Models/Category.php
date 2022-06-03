<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use App\Traits\EscapeUniCodeJson;
use Spatie\Sluggable\SlugOptions;
use App\Traits\HasTranslatableSlug;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory,
    NodeTrait,
    EscapeUniCodeJson,
    HasTranslations,
    HasTranslatableSlug;
    protected $fillable = ['name','status','slug','_lft','_rgt','parent_id'];
    public $translatable = ['name','slug']; //بحط هنا ال columns اللى عايز اترجمها
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
