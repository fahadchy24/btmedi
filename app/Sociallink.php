<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sociallink extends Model
{
    protected $fillable = [
        'facebook', 'twitter', 'instagram', 'pinterest', 'f_status', 't_status', 'i_status', 'p_status'
    ];

    public $timestamps = false;
}
