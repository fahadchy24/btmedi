<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('guest_id')->nullable();
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('order_date')->nullable();
            $table->string('invoice_number');
            $table->string('payment')->default('Pending');;
            $table->string('payment_method')->default('Cash');
            $table->string('transaction_id')->nullable();
            $table->string('status')->default('Pending Order');
            $table->string('userType')->default('General');
            $table->decimal('sub_total', 10,2)->nullable();
            $table->decimal('discount', 10,2)->nullable();
            $table->decimal('total', 10,2);
            $table->decimal('tax', 10,2)->default('0.00');
            $table->decimal('shipping_fee',10,2)->nullable();
            $table->integer('billing_id')->nullable();
            $table->integer('shipping_id')->nullable();
            $table->tinyInteger('isDifferentShipping')->default('0');
            $table->text('remark')->nullable();
            $table->text('internal_remark')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
