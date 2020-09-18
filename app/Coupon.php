<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_code', 'coupon_type', 'coupon_amount', 'expiry_date', 'status',
    ];
}
