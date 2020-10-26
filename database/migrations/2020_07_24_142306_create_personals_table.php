<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('bg_image')->nullable();
            $table->string('file')->nullable();
            $table->string('image');
            $table->string('name');
            $table->string('email');
            $table->string('contact');
            $table->string('address');
            $table->longText('objective')->nullable();
            $table->longText('summary');
            $table->string('keywords');
            $table->longText('skills');
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
        Schema::dropIfExists('personals');
    }
}
