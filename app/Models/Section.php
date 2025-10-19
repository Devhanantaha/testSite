<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    public $timestamps = true;
    protected $appends = ['courseCount','ImageFullPath'] ;   
    
    
    public function getCourseCountAttribute(){
     return $this->courses()->count();   
    }

    public function getImageFullPathAttribute($value)
    {
    
        if($this->image)
            return asset('public/'.$this->image);
    }
    protected $fillable = array('name','active','description');

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function courses()
    {
        // return $this->belongsToMany(Course::class,'course_tracks');
        return $this->belongsToMany(Course::class, 'course_sections', 'section_id', 'course_id');

    }
}
