<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
		'product_id', 'name' , 'email', 'rating', 'status'
	];

	public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
