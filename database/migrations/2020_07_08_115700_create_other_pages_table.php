<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_pages', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title');
            $table->string('meta_description')->nullable();
            $table->string('page_type');
            $table->string('page_url');
            $table->string('page_content');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_pages');
    }
}
