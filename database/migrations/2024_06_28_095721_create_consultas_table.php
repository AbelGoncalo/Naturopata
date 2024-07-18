<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Medico,Utente};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_consulta');
            $table->date('data_marcacao');
            $table->date('data_realizacao');
            $table->enum('status',['efetuado','realizar'])->default('realizar');
            $table->foreignIdFor(Medico::class);
            $table->foreignIdFor(Utente::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
