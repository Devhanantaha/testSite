<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }



    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function getLocalNameAttribute()
    {
        return App::getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getLocalDescriptionAttribute()
    {
        return App::getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getMainImageAttribute()
    {
        $image = $this->images()->first();
        return 'public/'. $image->path ;
    }
}
