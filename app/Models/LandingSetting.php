<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingSetting extends Model
{
    use HasFactory;
    protected $fillable=['header_title','header_description','footer_description','most_required_courses',
    'recommend_courses','top_rated_courses','star_recently_courses','tracks','instructors',
    'workteam','parteners','student_opinion','map_locations','achievements','start_soon_period',
    'letter_news','book_shop_url','verification_expire_time_in_seconds','question_list','book_store_visiable',
    'free_courses','instructor_guide_file','student_guide_file','courses_header_title','courses_header_description','policy_header',
    'policy_description','quiz_header','quiz_description'
];

protected $appends = ['headerImageFullPath','footerImageFullPath','PlatformguideFileFullPath','InstructorguideFileFullPath','StudentguideFileFullPath','coursesheaderImageFullPath'];

public function getheaderImageFullPathAttribute($value)
{

    return asset('public/' . $this->header_image);
}


public function getcoursesheaderImageFullPathAttribute(){

    return asset('public/' . $this->course_header_image);
}


public function getInstructorguideFileFullPathAttribute($value)
{

    return asset('public/' . $this->instructor_guide_file);
}

public function getPlatformguideFileFullPathAttribute($value)
{

    return asset('public/' . $this->platform_guide_file);
}


public function getStudentguideFileFullPathAttribute($value)
{

    return asset('public/' . $this->student_guide_file);
}
public function getfooterImageFullPathAttribute($value)
{

    return asset('public/' . $this->footer_image);
}
}
