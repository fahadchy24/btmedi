<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    protected $fillable = [
        'product_id', 'label', 'color', 'stock', 'price', 'other'
    ];
}
