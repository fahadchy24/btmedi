<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guestusers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('fax')->nullable();
            $table->text('address_1');
            $table->text('address_2')->nullable();
            $table->string('country')->default('United States of America');
            $table->string('state');
            $table->string('city');
            $table->string('postcode');
            $table->string('taxable')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('guestusers');
    }
}
