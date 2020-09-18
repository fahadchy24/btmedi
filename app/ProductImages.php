<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable = [
        'product_id', 'product_image'
    ];

    protected $casts = [
        'product_id' => 'integer',
     ];
}
