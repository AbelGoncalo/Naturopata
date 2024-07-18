<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Planta};


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('folhas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('tipo', ['seca','verde']);
            $table->string('imagem')->nullable();
            $table->text('descricao');
            $table->foreignIdFor(Planta::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folhas');
    }
};
