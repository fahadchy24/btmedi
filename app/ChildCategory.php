<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $fillable = [ 
        'childcategory_name','childcategory_url', 'childcategory_description',  'cover_image', 'status'
    ];
}
