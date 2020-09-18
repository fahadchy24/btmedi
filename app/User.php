<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function orders(){
        return $this->hasMany(Order::class);
    }
    
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'phone', 'fax', 'company','address_1','address_2', 'country', 'state', 'city', 'postcode','newsletter','agree', 'userType', 'isActive', 'storeType', 'website','isLive', 'tax_id', 'founded', 'store_image', 'dept', 'userType', 'sp', 'price', 'active', 'active_date', 'terms', 'taxable', 'note', 'reseller_permit_number' , 'expiration_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
