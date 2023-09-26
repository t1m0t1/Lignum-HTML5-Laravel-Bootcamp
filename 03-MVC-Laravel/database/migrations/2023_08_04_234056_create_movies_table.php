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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('year')->nullable();
            $table->float('duration')->nullable();
            $table->text('synopsis')->nullable();
            $table->string('imageMovie')->nullable();
            /* $table->foreignId('mainActorId')->nullable(); */
            $table->timestamps();

            /* $table->foreign('mainActorId')->references('id')->on('actors'); */

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }

};
