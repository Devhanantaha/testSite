<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    // ✅ Accessors for multilingual fields
    public function getLocalNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->name_ar : $this->name_en;
    }

    public function getLocalDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getImageFullPathAttribute()
    {
        return $this->image ? asset('public/' . $this->image) : null;

    }
}
