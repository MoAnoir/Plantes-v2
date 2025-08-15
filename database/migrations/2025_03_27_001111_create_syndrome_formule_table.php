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
        Schema::create('syndrome_formule', function (Blueprint $table) {
            $table->id('id_syndrome_formule'); // Clé primaire auto-incrémentée
            $table->foreignId('id_syndrome')->constrained('syndromes', 'id_syndrome')->onDelete('cascade'); // Clé étrangère vers syndromes
            $table->foreignId('id_formule')->constrained('formules', 'id')->onDelete('cascade'); // Clé étrangère vers formules
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syndrome_formule');
    }
};
