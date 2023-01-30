<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('driver_positions', function (Blueprint $table) {
            $table->id();
            $table->string('position_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('driver_positions');
    }
};
