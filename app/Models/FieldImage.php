<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldImage extends Model
{
    use HasFactory;
        public $timestamps = false;


    protected $fillable = ['field_id', 'image_path'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
