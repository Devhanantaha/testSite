<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
     /**
     * @var string
     */
    protected $table = 'cmss';

    /**
     * @var array
     */
    protected $fillable = ['name', 'name2', 'content', 'content2','category_id' , 'product_id','state_id'];

    /**
     * @param $value
     */
    public function project()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function area()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function getLocalNameAttribute()
    {
         $local= session()->get('local');
         if($local == "ar"){
              return "{$this->name2}";
         }else{
              return "{$this->name}";
         }
        
    }
    public function getLocalDescriptionAttribute()
{
	$local= session()->get('local');
	if($local == "ar"){
		return "{$this->content2}";
	}else{
		return "{$this->content}";
	}
    
}
}
