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
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');                       // String
            $table->string('genero');                       // String
            $table->decimal('precio', 8, 2);                // Decimal (Numeric)
            $table->integer('stock');                       // Integer
            $table->date('fecha_lanzamiento');              // Date
            $table->boolean('en_oferta')->default(false);   // Boolean
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videojuegos');
    }
};
