<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function allImages(){
        return $this->hasMany(ProductImages::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function subcategories(){
        return $this->belongsToMany(SubCategory::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function attributes(){
        return $this->hasMany(ProductAttributes::class);
    }

    public function wishlist(){
        return $this->belongsTo(Wishlist::class, 'id', 'product_id');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'mpn', 'brand_id', 'product_tags' , 'product_name', 'short_description',  'full_description', 'specification', 'docs', 'manufactory', 'unit_per_cost', 'cost', 'regular_price', 'sale_price', 'sale_price_start_date', 'sale_price_end_date', 'sku',  'stock_quantity', 'backorders', 'low_stock_thershold', 'weight', 'length', 'width',  'height', 'shipping_class', 'quantity_limit', 'min_quantity', 'max_quantity' , 'main_image', 'is_featured', 'status', 'internal_remark', 'wholesale_price', 'wholesale_percent', 'retail_price', 'retail_percent', 'medical_price', 'medical_percent', 'school_price', 'school_percent', 'government_price', 'government_percent', 'nonprofit_price', 'nonprofit_percent'
    ];

    // protected $casts = [
    //     'category_id' => 'integer',
    //     'subcategory_id' => 'integer',
    //     'brand_id' => 'integer',
    //     'discount' => 'double',
    //     'sale_price' => 'double',
    //     'regular_price' => 'double',
    //     'stock' => 'integer',
    // ];
}
