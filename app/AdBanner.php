<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdBanner extends Model
{
    protected $fillable = [
        'first_image', 'second_image', 'status'
    ];
}
