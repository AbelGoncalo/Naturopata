<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Doenca,Planta};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doenca_plantas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Doenca::class);
            $table->foreignIdFor(Planta::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doenca_plantas');
    }
};
