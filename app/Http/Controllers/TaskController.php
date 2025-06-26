<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Afficher les tâches associées à un projet spécifique
    public function index(Project $project)
    {
        $tasks = $project->tasks; // Récupérer toutes les tâches du projet
        return view('tasks.index', compact('project', 'tasks'));
    }

    // Afficher le formulaire pour ajouter une tâche à un projet
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    // Enregistrer une nouvelle tâche dans la base de données
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,in progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $project->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => auth()->id(), // L'utilisateur qui a créé la tâche
        ]);

        return redirect()->route('projects.tasks.index', $project);
    }

    // Modifier une tâche existante
    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    // Mettre à jour une tâche
    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pending,in progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());

        return redirect()->route('projects.tasks.index', $project);
    }

    // Supprimer une tâche
    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('projects.tasks.index', $project);
    }
}
