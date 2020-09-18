<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociallinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sociallinks', function (Blueprint $table) {
            $table->id();
            $table->string('facebook'); 
            $table->string('instagram'); 
            $table->string('twitter');
            $table->string('pinterest');
            $table->tinyInteger('f_status')->default(1);
            $table->tinyInteger('i_status')->default(1);
            $table->tinyInteger('t_status')->default(1);
            $table->tinyInteger('p_status')->default(1); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sociallinks');
    }
}
