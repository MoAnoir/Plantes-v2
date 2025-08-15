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
        Schema::create('formule_plante', function (Blueprint $table) {
            $table->id(); // Clé primaire optionnelle pour la table pivot
            $table->foreignId('plante_id')->constrained('plantes')->onDelete('cascade');
            $table->foreignId('formule_id')->constrained('formules')->onDelete('cascade');
            $table->string('role_formule', 50)->nullable();
            $table->decimal('pourcentage_formule', 5, 2)->nullable();
            $table->timestamps();

            // Index unique pour éviter les doublons (optionnel)
            $table->unique(['plante_id', 'formule_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formule_plante');
    }
};
