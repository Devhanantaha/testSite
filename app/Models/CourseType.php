<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;
    protected $table = 'course_types';
    public $timestamps = true;
    protected $appends = ['name'];

    protected function getNameAttribute()
    {
        if (app()->getLocale() == 'en')
        return $this->attributes['name_en'];
        else
        return $this->attributes['name'];
    }
    protected $fillable = array('name', 'active', 'name_en');

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'course_type_id', 'id');
    }
}
