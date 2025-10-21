<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class AboutSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_title_ar', 'about_title_en', 'about_description_ar', 'about_description_en', 'about_image',
        'mission_title_ar', 'mission_title_en', 'mission_description_ar', 'mission_description_en', 'mission_image',
        'goals_title_ar', 'goals_title_en', 'goals_description_ar', 'goals_description_en', 'goals_image',
        'history_title_ar', 'history_title_en', 'history_description_ar', 'history_description_en', 'history_image',
        'student_number', 'lecture_number', 'instructor_number', 'course_number',
    ];

    protected $appends = [
        'aboutImageFullPath', 
        'missionImageFullPath', 
        'goalsImageFullPath', 
        'historyImageFullPath',
        'about_title', 'about_description',
        'mission_title', 'mission_description',
        'goals_title', 'goals_description',
        'history_title', 'history_description'
    ];

    /** Image Accessors */
    public function getAboutImageFullPathAttribute()
    {
        return $this->about_image ? asset('public/' . $this->about_image) : null;
    }

    public function getMissionImageFullPathAttribute()
    {
        return $this->mission_image ? asset('public/' . $this->mission_image) : null;
    }

    public function getGoalsImageFullPathAttribute()
    {
        return $this->goals_image ? asset('public/' . $this->goals_image) : null;
    }

    public function getHistoryImageFullPathAttribute()
    {
        return $this->history_image ? asset('public/' . $this->history_image) : null;
    }

    /** Locale-based title & description accessors */
    public function getAboutTitleAttribute()
    {
        return App::getLocale() === 'ar' ? $this->about_title_ar : $this->about_title_en;
    }

    public function getAboutDescriptionAttribute()
    {
        return App::getLocale() === 'ar' ? $this->about_description_ar : $this->about_description_en;
    }

    public function getMissionTitleAttribute()
    {
        return App::getLocale() === 'ar' ? $this->mission_title_ar : $this->mission_title_en;
    }

    public function getMissionDescriptionAttribute()
    {
        return App::getLocale() === 'ar' ? $this->mission_description_ar : $this->mission_description_en;
    }

    public function getGoalsTitleAttribute()
    {
        return App::getLocale() === 'ar' ? $this->goals_title_ar : $this->goals_title_en;
    }

    public function getGoalsDescriptionAttribute()
    {
        return App::getLocale() === 'ar' ? $this->goals_description_ar : $this->goals_description_en;
    }

    public function getHistoryTitleAttribute()
    {
        return App::getLocale() === 'ar' ? $this->history_title_ar : $this->history_title_en;
    }

    public function getHistoryDescriptionAttribute()
    {
        return App::getLocale() === 'ar' ? $this->history_description_ar : $this->history_description_en;
    }
}
