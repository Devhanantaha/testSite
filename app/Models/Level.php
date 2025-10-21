<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
class Level extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar','name_en', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

     public function getNameAttribute()
 {
     $locale = App::getLocale();
     return $this->{'name_' . $locale} ?? $this->name_en;
 }
}
