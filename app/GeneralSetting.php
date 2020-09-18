<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [ 
        'logo', 'top_header', 'popup_banner', 'banner_status', 'street', 'phone_one', 'phone_two', 'email', 'website_footer'
    ];

    public $timestamps = false;
}
