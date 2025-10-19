<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $table = 'tracks';
    public $timestamps = true;
    protected $appends = ['courseCount', 'ImageFullPath'];


    public function getCourseCountAttribute()
    {
        return $this->courses()->count();
    }

    public function getImageFullPathAttribute($value)
    {

        if ($this->image)
            return asset('public/' . $this->image);
    }
    protected $fillable = array('name', 'active','parent_id','description');

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function courses()
    {
        // return $this->belongsToMany(Course::class,'course_tracks');
        return $this->belongsToMany(Course::class, 'course_tracks', 'track_id', 'course_id');
    }

    // In the Track model (Track.php)

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
