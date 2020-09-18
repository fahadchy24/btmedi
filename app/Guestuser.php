<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guestuser extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'fax', 'company', 'address_1', 'address_2', 'country', 'state', 'city', 'postcode', 'taxable', 'tax_id', 'note'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
