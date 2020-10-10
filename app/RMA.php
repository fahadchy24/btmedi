<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RMA extends Model
{
    protected $fillable = [
        'rma_number', 'order_date', 'order_id', 'order_number', 'email', 'issued_by', 'completed_by', 'remark', 'restocking_fee', 'note', 'tax', 'total_refund', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'order_number', 'order_number');
    }
}
