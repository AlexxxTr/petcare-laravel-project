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
        Schema::table('administrations', function (Blueprint $table) {
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->foreign('medicine_id')->references('id')->on('medicines');
        });

        Schema::table('administrations_language', function (Blueprint $table) {
            $table->foreign('adminstration_id')->references('id')->on('administrations');
        });

        Schema::table('house_guests', function (Blueprint $table) {
            $table->foreign('house_id')->references('id')->on('houses');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('houses', function (Blueprint $table) {
            $table->foreign('owner')->references('id')->on('users');
        });

        Schema::table('pets', function (Blueprint $table) {
            $table->foreign('house_id')->references('id')->on('houses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
    }
};
