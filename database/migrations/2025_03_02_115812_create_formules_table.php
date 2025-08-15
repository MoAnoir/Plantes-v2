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
        Schema::create('formules', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255);
            $table->string('nom_alternatif', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('indications');
            $table->text('posologie');
            $table->text('contre_indications')->nullable();
            $table->text('pharmacologie')->nullable();
            $table->text('toxicologie')->nullable();
            $table->text('composition')->nullable();
            $table->text('etudes_cliniques')->nullable();
            $table->text('remarques')->nullable();
            $table->string('categorie', 100)->nullable();
            $table->date('date_creation')->nullable();
            $table->string('statut', 50)->default('Validée');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formules');
    }
};
