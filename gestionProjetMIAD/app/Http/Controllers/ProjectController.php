<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Liste tous les projets (ou seulement ceux de l'utilisateur).
     */
    public function index()
    {
        // Si vous êtes admin, vous pouvez lister tous les projets
        // Sinon, seulement ceux dont l'utilisateur connecté fait partie
        if (auth()->user()->role->name === 'Admin') {
            $projects = Project::all();
        } else {
            $projects = auth()->user()->projects;
        }

        return view('projects.index', compact('projects'));
    }

    /**
     * Montre le formulaire de création d'un nouveau projet.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Enregistre un nouveau projet en base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date',
        ]);

        $project = new Project();
        $project->title       = $request->title;
        $project->description = $request->description;
        $project->start_date  = $request->start_date;
        $project->end_date    = $request->end_date;
        $project->status      = 'En cours'; // par défaut
        $project->save();

        // Optionnel : attacher l'utilisateur courant ou d'autres utilisateurs
        // $project->users()->attach(auth()->id());

        return redirect()->route('projects.index')
                         ->with('success', 'Projet créé avec succès!');
    }

    /**
     * Affiche un projet spécifique.
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);

        // Vérifier si l'utilisateur a le droit de voir ce projet, etc.
        return view('projects.show', compact('project'));
    }

    /**
     * Montre le formulaire d'édition du projet.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Met à jour les données d'un projet.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date',
            'status'      => 'required|string|max:50'
        ]);

        $project = Project::findOrFail($id);
        $project->title       = $request->title;
        $project->description = $request->description;
        $project->start_date  = $request->start_date;
        $project->end_date    = $request->end_date;
        $project->status      = $request->status;
        $project->save();

        return redirect()->route('projects.index')
                         ->with('success', 'Projet mis à jour avec succès!');
    }

    /**
     * Supprime un projet de la base de données.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Vérifier si l'utilisateur peut supprimer ce projet
        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success', 'Projet supprimé avec succès!');
    }
}
