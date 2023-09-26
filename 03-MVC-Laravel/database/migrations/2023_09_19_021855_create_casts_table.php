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
        Schema::create('casts', function (Blueprint $table) {
            $table->id('castID');
            $table->foreignId('movieId');
            $table->foreignId('actorId');
            $table->timestamps();

            $table->foreign('movieId')->references('id')->on('movies');
            $table->foreign('actorId')->references('id')->on('actors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casts');
    }
};
