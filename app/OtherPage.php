<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherPage extends Model
{
    protected $fillable = [
        'meta_title', 'meta_desciption', 'page_type', 'page_url', 'page_content', 'status' 
    ];
    
    public $timestamps = false;
}
