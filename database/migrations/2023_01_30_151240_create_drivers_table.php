<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('position_id')->nullable();

            $table->foreign('position_id')->references('id')->on('driver_positions');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
