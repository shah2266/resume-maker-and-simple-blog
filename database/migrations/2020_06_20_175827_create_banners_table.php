<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('name');
            $table->tinyInteger('banner_type');
            $table->string('short_info_1')->nullable();
            $table->string('short_info_2')->nullable();
            $table->string('button1_label')->nullable();
            $table->string('button1_link')->nullable();
            $table->string('button2_label')->nullable();
            $table->string('button2_link')->nullable();
            $table->tinyInteger('status')->default(0); //0 is in active, 1 is active
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
        Schema::dropIfExists('banners');
    }
}
