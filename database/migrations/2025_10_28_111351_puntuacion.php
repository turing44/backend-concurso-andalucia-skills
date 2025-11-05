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
        Schema::create('puntuaciones', function (Blueprint $table) {
            $table->id();
            $table->string("puntuacion_1");
            $table->string("puntuacion_2");
            $table->string("puntuacion_3");
            $table->string("puntuacion_4");
            $table->foreignId("competidor_id")->constrained("competidores");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('puntuaciones', function (Blueprint $table) {
            $table->dropIfExists("puntuaciones");
        });
    }
};
