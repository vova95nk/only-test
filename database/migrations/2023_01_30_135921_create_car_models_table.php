<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacture_id');
            $table->string('model_name');

            $table->unique(['manufacture_id', 'model_name']);

            $table->foreign('manufacture_id')->references('id')->on('car_manufactures');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
