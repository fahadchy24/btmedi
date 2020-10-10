<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_type', 'order_number', 'guest_id', 'contact_email', 'product_id', 'quantity', 'invoice_number', 'payment', 'payment_method', 'sub_total', 'tax', 'shipping_fee', 'total', 'remark', 'internal_remark', 'transaction_id', 'status', 'invoice_id','user_id',  'discount',  'status', 'userType', 'billing_id', 'shipping_id', 'isDifferentShipping'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guest(){
        return $this->belongsTo(Guestuser::class, 'guest_id');
    }
}
