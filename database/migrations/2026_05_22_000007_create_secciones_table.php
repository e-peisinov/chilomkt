<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('pagina');
            $table->string('clave')->unique();
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->text('contenido')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('secciones');
    }
};
