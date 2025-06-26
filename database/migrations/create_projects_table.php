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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // Identifiant unique du projet
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relation avec l'utilisateur (créateur du projet)
            $table->string('name'); // Nom du projet
            $table->text('description')->nullable(); // Description du projet
            $table->date('start_date')->nullable(); // Date de début du projet
            $table->date('end_date')->nullable(); // Date de fin du projet
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects'); // Supprime la table en cas de rollback
    }
};
