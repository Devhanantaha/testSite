<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseJob extends Model
{
    use HasFactory;
    protected $table = 'course_jobs';
    public $timestamps = true;

    protected $fillable = array('course_id','job_id');
}
