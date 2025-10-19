<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    public $timestamps = true;

    protected $appends = ['ImageFullPath'] ;   


    public function getImageFullPathAttribute($value)
    {
    
        if($this->image)
            return asset('public/'.$this->image);
    }
    protected $fillable = array('name','active','code');

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
