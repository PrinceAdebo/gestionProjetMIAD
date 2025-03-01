<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Notifications\TaskAssigned; // si vous avez une notification

class TaskController extends Controller
{
    /**
     * Liste des tâches, soit toutes, soit pour un projet précis, 
     * soit pour un utilisateur.
     */
    public function index(Request $request)
    {
        // Exemple : si on veut lister toutes les tâches
        // ou seulement celles appartenant à un certain projet
        if ($request->has('project_id')) {
            $tasks = Task::where('project_id', $request->project_id)->get();
        } else {
            // ou alors toutes les tâches
            $tasks = Task::all();
        }

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Formulaire de création d'une tâche (lié à un projet).
     */
    public function create($projectId)
    {
        $project = Project::findOrFail($projectId);
        return view('tasks.create', compact('project'));
    }

    /**
     * Enregistre une nouvelle tâche en base, puis notifie l'utilisateur concerné (optionnel).
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'project_id'  => 'required|integer|exists:projects,id',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'assigned_to' => 'nullable|integer|exists:users,id', // si vous assignez à un user
        ]);

        $task = new Task();
        $task->title       = $request->title;
        $task->project_id  = $request->project_id;
        $task->description = $request->description;
        $task->due_date    = $request->due_date;
        $task->status      = 'En cours';
        $task->save();

        // Si vous gérez l'assignation via un champ user_id (simple)
        if ($request->has('assigned_to')) {
            // Soit vous avez une colonne "user_id" dans tasks
            // $task->user_id = $request->assigned_to;
            // $task->save();

            // Ou si c'est via une table pivot "task_user"
            $task->users()->attach($request->assigned_to);

            // (Optionnel) Envoyer une notification
            // $user = User::find($request->assigned_to);
            // $user->notify(new TaskAssigned($task));
        }

        return redirect()->route('tasks.index')
                         ->with('success', 'Tâche créée avec succès!');
    }

    /**
     * Afficher une tâche donnée.
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Formulaire d'édition d'une tâche.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Mise à jour des données d'une tâche.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date'    => 'nullable|date',
            'status'      => 'required|string|max:20', // En cours, Terminée, etc.
        ]);

        $task = Task::findOrFail($id);
        $task->title       = $request->title;
        $task->description = $request->description;
        $task->due_date    = $request->due_date;
        $task->status      = $request->status;
        $task->save();

        return redirect()->route('tasks.index')
                         ->with('success', 'Tâche mise à jour avec succès!');
    }

    /**
     * Marque la tâche comme terminée (ou autre statut).
     */
    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'Terminée';
        $task->save();

        return redirect()->route('tasks.index')
                         ->with('success', 'Tâche marquée comme terminée!');
    }

    /**
     * Supprime une tâche.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Tâche supprimée avec succès!');
    }
}
