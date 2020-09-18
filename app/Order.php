<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_type', 'order_number', 'invoice_number', 'sub_total', 'tax', 'shipping_fee', 'total', 'remark', 'internal_remark', 'transaction_id', 'payment', 'status', 'invoice_id','user_id', 'guest_id', 'product_id', 'discount', 'quantity', 'status', 'userType', 'billing_id', 'shipping_id', 'isDifferentShipping'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guest(){
        return $this->belongsTo(GuestUser::class, 'guest_id');
    }
}
