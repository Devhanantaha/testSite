<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_ar', 'answer_ar',
        'question_en', 'answer_en',
        'active',
    ];

    // Scope for active questions
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    // Localized question
    public function getQuestionAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar') {
            return $this->question_ar ?: $this->question_en ?: 'No question available';
        }
        return $this->question_en ?: $this->question_ar ?: 'No question available';
    }

    // Localized answer
    public function getAnswerAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar') {
            return $this->answer_ar ?: $this->answer_en ?: 'No answer available';
        }
        return $this->answer_en ?: $this->answer_ar ?: 'No answer available';
    }
}
