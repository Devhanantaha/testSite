<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCertificationAbbreviation extends Model
{
    use HasFactory;
    protected $table = 'course_certification_abbrevitions';
    public $timestamps = true;

    protected $fillable = array('course_id','certification_abbreviation_id');
}
