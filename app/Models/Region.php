<?php

namespace App\Models;

use App\Traits\EscapeUniCodeJson;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory, 
    EscapeUniCodeJson,
    HasTranslations;
    protected $fillable = ['name', 'status','latitude','longitude','radius','city_id'];
    public $translatable = ['name'];
}
