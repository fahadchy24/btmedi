<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $table = 'categories';

    protected $fillable = [
        'category_name', 'category_url',  'thumbnail_image', 'cover_image', 'priority', 'status'
    ];

    /* public function menu()
    {
    	return $this->belongsTo(Menu::class, 'menu_id');
    } */

    public function subcategories()
    {
    	return $this->hasMany(SubCategory::class, 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
