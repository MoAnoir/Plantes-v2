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
        Schema::create('plante_toxication', function (Blueprint $table) {
            $table->foreignId('plante_id')->constrained('plantes')->onDelete('cascade');
            $table->foreignId('toxicacion_id')->constrained('toxications')->onDelete('cascade');
            $table->primary(['plante_id', 'toxicacion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plante_toxication');
    }
};
