<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Afficher la liste des projets
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    // Afficher le formulaire pour créer un nouveau projet
    public function create()
    {
        return view('projects.create');
    }

    // Enregistrer un nouveau projet dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('projects.index');
    }

    // Afficher les détails d'un projet spécifique
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Afficher le formulaire pour modifier un projet
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Mettre à jour un projet existant
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index');
    }

    // Supprimer un projet
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
