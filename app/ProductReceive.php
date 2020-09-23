<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReceive extends Model
{
    protected $fillable = [
        'receive_date', 'vendor_id', 'tracking_number', 'sku', 'product_name', 'quantity', 'cost'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
