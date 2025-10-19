<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar', 'title_en',
        'url',
        'image', 'active'
    ];

    protected $appends = ['imageFullPath', 'title'];

    public function getImageFullPathAttribute()
    {
        return $this->image
            ? asset('public/' . $this->image)
            : asset('public/uploads/banners/default.png');
    }

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }




    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}

 

