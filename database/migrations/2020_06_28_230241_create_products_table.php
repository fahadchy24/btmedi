<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('product_tags')->nullable();
            $table->string('product_name');
            $table->text('short_description');
            $table->text('full_description');
            $table->text('specification')->nullable();
            $table->string('docs')->nullable();
            $table->float('regular_price');
            $table->float('sale_price')->nullable();
            $table->date('sale_price_start_date')->nullable();
            $table->date('sale_price_end_date')->nullable();
            $table->integer('sku');
            $table->integer('stock_quantity');
            $table->string('backorders');
            $table->integer('low_stock_thershold')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('shipping_class')->nullable();
            $table->string('quantity_limit')->nullable();
            $table->integer('min_quantity')->nullable();
            $table->integer('max_quantity')->nullable();
            $table->string('main_image');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
