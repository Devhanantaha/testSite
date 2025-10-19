<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $table = 'downloads';
    public $timestamps = true;

    protected $fillable = [
        'title_en',
        'title_ar',
        'url',
        'attachment',
        'active',
        'active'
    ];

    /**
     * Accessor for full image path
     */

    /**
     * Accessor for full attachment URL
     */
    public function getAttachmentUrlAttribute()
    {
        return $this->attachment ? asset('public/' . $this->attachment) : null;
    }

    /**
     * Scope: Only active downloads
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Dynamic title accessor based on app locale
     */
    public function getLocalTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'ar' ? ($this->title_ar ?? $this->title_en) : ($this->title_en ?? $this->title_ar);
    }
}
