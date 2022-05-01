<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('type');
            $table->string('name');
            $table->integer('house_id');
        });

        Schema::create('pictures', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('pet_id');
            $table->string('image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
        Schema::dropIfExists('pictures');
    }
};
