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
        Schema::create('plantes', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nom_chinois', 100); // VARCHAR(100) NOT NULL
            $table->string('nom_latin', 200); // VARCHAR(200) NOT NULL
            $table->string('partie_utilisee', 100); // VARCHAR(100) NOT NULL
            $table->text('description')->nullable(); // TEXT, nullable
            
            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantes');
    }
};
