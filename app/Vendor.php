<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'vendor_id', 'name', 'email', 'address', 'phone', 'remark'
    ];
}
