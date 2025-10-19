<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTrack extends Model
{
    use HasFactory;
    protected $table = 'course_tracks';
    public $timestamps = true;

    protected $fillable = array('course_id','track_id');
}
