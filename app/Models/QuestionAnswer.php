<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $fillable = array('title','active','qquestion_id');
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
