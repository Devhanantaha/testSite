<?php  

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    public $timestamps = true;

    protected $fillable = [
        'title_ar', 'title_en',
        'description_ar', 'description_en',
        'active', 'main_image', 'published_at'
    ];

    protected $appends = [
        'imageFullPath',
        'CustomPublishdate',
        'title',
        'description'
    ];

    // 🔹 Localized title accessor
    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'title_' . $locale} ?? $this->title_en;
    }

    // 🔹 Localized description accessor
    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{'description_' . $locale} ?? $this->description_en;
    }

    // 🔹 Custom publish date
    protected function getCustomPublishdateAttribute()
    {
        $dateFormatter = new \IntlDateFormatter(
            'ar',
            \IntlDateFormatter::SHORT,
            \IntlDateFormatter::SHORT,
            'Asia/Riyadh',
            \IntlDateFormatter::TRADITIONAL
        );
        $dateFormatter->setPattern('HH:mm - d MMMM yyyy');

        $timestamp = strtotime($this->published_at);
        return $dateFormatter->format($timestamp);
    }

    // 🔹 Image full path
    public function getImageFullPathAttribute()
    {
        if ($this->main_image)
            return asset('public/' . $this->main_image);
        else
            return asset('public/uploads/blogs/default.png');
    }

    // 🔹 Active scope
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
