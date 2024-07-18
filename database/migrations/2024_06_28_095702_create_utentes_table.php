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
        Schema::create('utentes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nascimento');
            $table->string('bi');
            $table->string('genero');
            $table->string('telefone');
            $table->string('provincia');
            $table->string('endereco')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utentes');
    }
};
