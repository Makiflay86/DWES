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
        Schema::create('posts', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('user_id');                                      // campo añadido
            $table->foreign('user_id')->references('id')->on('users');                  // campo añadido
            $table->unsignedBigInteger('category_id');                                  // campo añadido
            $table->foreign('category_id')->references('id')->on('categories');         // campo añadido
            $table->string('title');                                                    // campo añadido
            $table->text('body');                                                       // campo añadido
            $table->string('image');                                                    // campo añadido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
