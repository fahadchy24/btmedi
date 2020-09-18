<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_receives', function (Blueprint $table) {
            $table->id();
            $table->string('receive_date');
            $table->integer('vendor_id');
            $table->string('tracking_number');
            $table->string('sku');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('cost');
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
        Schema::dropIfExists('product_receives');
    }
}
