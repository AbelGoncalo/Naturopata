<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Utente};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registro_clinicos', function (Blueprint $table) {
            $table->id();
            $table->string('grupo_saguino')->nullable();
            $table->string('alergias')->nullable();
            $table->string('historico_saude')->nullable();
            $table->foreignIdFor(Utente::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_clinicos');
    }
};
