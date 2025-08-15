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
        Schema::create('syndromes', function (Blueprint $table) {
            $table->id('id_syndrome'); // Clé primaire auto-incrémentée
            $table->string('nom_syndrome', 255)->unique(); // Nom du syndrome, unique
            $table->text('description')->nullable(); // Description, facultative
            $table->string('categorie', 100)->nullable(); // Catégorie, facultative
            $table->string('organe_associe', 50)->nullable(); // Organe associé, facultatif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syndromes');
    }
};
