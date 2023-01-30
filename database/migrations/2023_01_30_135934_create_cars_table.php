<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacture_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('category_id');
            $table->tinyInteger('is_locked')->default(false);

            $table->foreign('manufacture_id')->references('id')->on('car_manufactures');
            $table->foreign('model_id')->references('id')->on('car_models');
            $table->foreign('category_id')->references('id')->on('car_categories');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
