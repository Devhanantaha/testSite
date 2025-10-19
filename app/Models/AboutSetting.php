<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    use HasFactory;
    protected $fillable = array('title','description','student_number','lecture_number','instructor_number','course_number'
                               , 'mission_title','mission_description','mission_image',
                               'msg_title1','msg_title2','msg_title3','msg_title4',
                               'msg_desc1','msg_desc2','msg_desc3','msg_desc4',

);

protected $appends = ['missionimageFullPath','backgroundImageFullPath','msgImage1FullPath'
,'msgImage2FullPath','msgImage3FullPath','msgImage4FullPath'];

public function getmissionimageFullPathAttribute($value)
{

    return asset('public/' . $this->mission_image);
}

public function getbackgroundImageFullPathAttribute($value)
{

    return asset('public/' . $this->background_image);
}

public function getmsgImage1FullPathAttribute($value)
{

    return asset('public/' . $this->msg_image1);
}

public function getmsgImage2FullPathAttribute($value)
{

    return asset('public/' . $this->msg_image2);
}

public function getmsgImage3FullPathAttribute($value)
{

    return asset('public/' . $this->msg_image3);
}

public function getmsgImage4FullPathAttribute($value)
{

    return asset('public/' . $this->msg_image4);
}


}
