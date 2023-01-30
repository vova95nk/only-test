<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('position_cars', function (Blueprint $table) {
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('position_id')->references('id')->on('driver_positions');
            $table->foreign('category_id')->references('category_id')->on('cars');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('position_cars');
    }
};
