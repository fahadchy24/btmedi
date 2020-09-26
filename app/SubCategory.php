<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [ 
        'subcategory_name', 'category_id' ,'subcategory_url', 'subcategory_description', 'thumbnail_image',  'cover_image', 'status'
    ];

    // /* public function menu()
	// {
	// return $this->belongsTo(Menu::class, 'menu_id');
	// } */

	public function category()
	{
	return $this->belongsTo(Category::class, 'category_id');
	}

	public function products()
    {
        return $this->hasMany(Product::class);
    }
}
