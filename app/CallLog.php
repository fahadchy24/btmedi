<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone', 'email', 'company', 'address_1', 'city', 'state', 'country', 'postcode', 'fax', 'issue', 'solution', 'note', 'userType', 'created_by'
     ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
