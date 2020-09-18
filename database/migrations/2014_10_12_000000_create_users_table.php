<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userType')->nullable()->default("General");
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('company')->nullable();
            $table->text('address_1');
            $table->text('address_2')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('postcode');
            $table->tinyInteger('newsletter')->nullable();
            $table->tinyInteger('agree');
            $table->tinyInteger('isActive')->default(1);
            $table->string('storeType')->nullable();
            $table->string('dept')->nullable();
            $table->string('website')->nullable();
            $table->tinyInteger('isLive')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('founded')->nullable();
            $table->string('store_image')->nullable();
            $table->string('sp')->nullable();
            $table->string('price')->nullable();
            $table->string('active')->nullable();
            $table->string('active_date')->nullable();
            $table->text('terms')->nullable();
            $table->text('note')->nullable();
            $table->string('reseller_permit_number')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('taxable')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
