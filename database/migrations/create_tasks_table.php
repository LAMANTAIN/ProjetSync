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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Identifiant unique de la tâche
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Relation avec le projet
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Optionnel : utilisateur assigné à la tâche
            $table->string('name'); // Nom de la tâche
            $table->text('description')->nullable(); // Description de la tâche
            $table->enum('status', ['pending', 'in progress', 'completed'])->default('pending'); // Statut de la tâche
            $table->date('due_date')->nullable(); // Date limite de la tâche
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks'); // Supprime la table en cas de rollback
    }
};
