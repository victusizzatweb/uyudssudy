<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('location_uz');
            $table->string('location_ru');
            $table->string('location_en');
            $table->string('header_logo');
            $table->string('location_image');
            $table->string('working_time');
            $table->string('working_t_image');
            $table->string('phone');
            $table->string('phone_image');
            $table->longText('map');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
