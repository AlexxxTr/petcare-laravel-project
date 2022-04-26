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
        Schema::create('administrations', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('pet_id');
            $table->date('date');
            $table->string('meal');
            $table->string('notes')->default('');
            $table->boolean('done')->default(false); // Leaving it here for NodeJs server
            $table->integer('medicine_id');
        });

        Schema::create('administrations_language', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('adminstration_id');
            $table->date('date');
            $table->string('meal');
            $table->string('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrations');
        Schema::dropIfExists('administrations_language');
    }
};
