<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['title_ar', 'title_en', 'description_ar', 'description_en'];

    public function images()
    {
        return $this->hasMany(FieldImage::class);
    }

    public function videos()
    {
        return $this->hasMany(FieldVideo::class);
    }

    public function getTitleAttribute()
    {
        $locale = App::getLocale();
        return $this->{'title_' . $locale} ?? $this->title_en;
    }

    public function getDescriptionAttribute()
    {
        $locale = App::getLocale();
        return $this->{'description_' . $locale} ?? $this->description_en;
    }
}
