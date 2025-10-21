<?php





namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldVideo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['field_id', 'video_path'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}

