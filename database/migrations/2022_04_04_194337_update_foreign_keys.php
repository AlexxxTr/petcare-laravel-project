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
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('no action');
        });

        Schema::table('administrations_language', function (Blueprint $table) {
            $table->foreign('adminstration_id')->references('id')->on('administrations')->onDelete('cascade');
        });

        Schema::table('house_guests', function (Blueprint $table) {
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
            $table->foreign('guest_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('houses', function (Blueprint $table) {
            $table->foreign('owner')->references('id')->on('users');
        });

        Schema::table('pets', function (Blueprint $table) {
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('no action');
        });

        Schema::table('pictures', function (Blueprint $table) {
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('no action');
        });

        Schema::table('medicines', function (Blueprint $table) {
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('no action');
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
