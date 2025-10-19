<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=['title','email','address','phone','facebook_url',
    'twitter_url','instgram_url','youtube_url','currency','whatsapp',
    'telephone','telegram_number','linkedin_url','tiktok_url','address_on_map','map_link','book_shop_link','snapchat_url'
    ,'lat','lng','contact_header_description','contact_header_title'
];
protected $appends = ['loginImageFullPath','registerImageFullPath' ,'logoFullPath', 'iconFullPath'];

public function getLoginImageFullPathAttribute($value)
{

    return asset('public/' . $this->login_image);
}

public function getregisterImageFullPathAttribute($value)
{

    return asset('public/' . $this->register_image);
}

public function getLogoFullPathAttribute($value)
{

    return asset('public/' . $this->logo_path);
}

public function getIconFullPathAttribute($value)
{

    return asset('public/' . $this->favicon_path);
}
}
