<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('company');
            $table->string('address_1');
            $table->text('city');
            $table->text('state');
            $table->text('country');
            $table->text('postcode');
            $table->text('fax');
            $table->text('issue');
            $table->text('solution');
            $table->text('note');
            $table->string('userType');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_logs');
        Schema::dropIfExists('user_id');
        Schema::dropIfExists('created_by');

    }
}
