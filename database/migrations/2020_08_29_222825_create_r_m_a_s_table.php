<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRMASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_m_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('rma_number');
            $table->string('order_date')->nullable();
            $table->integer('order_id');
            $table->string('email');
            $table->string('issued_by')->nullable();
            $table->string('completed_by')->nullable();
            $table->text('remark')->nullable();
            $table->string('restocking_fee')->nullable();
            $table->string('note')->nullable();
            $table->string('tax')->nullable();
            $table->string('total_refund')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('r_m_a_s');
    }
}
