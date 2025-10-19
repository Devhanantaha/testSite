<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInstructor extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'course_instructors';
    public $timestamps = true;

    protected $fillable = array('course_id','instructor_id','course_price','course_prectange','instructor_status',
'subscriptions_count','instructor_total_profits');


    protected function instructor(){
        return $this->belongsTo(Instructor::class);
    }
    
    protected function course(){
        return $this->belongsTo(Course::class);
    }
}
