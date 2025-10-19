<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;
    protected $table = 'course_sections';
    public $timestamps = true;

    protected $fillable = array('course_id','section_id');
}
