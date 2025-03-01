<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    /**
     * Affiche la page d'accueil personnalisée de l'utilisateur.
     * Montre la liste des projets auxquels il participe 
     * et un aperçu des tâches, deadlines, etc.
     */
    public function index()
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        // Par exemple : récupérer les projets de l'utilisateur
        // selon la relation belongsToMany (projects <-> users)
        $projects = $user->projects()->with('tasks')->get();

        // Vous pourriez aussi récupérer les tâches attribuées à l'utilisateur
        $tasks = $user->tasks()->where('status', 'En cours')->get();

        // Retour de la vue "dashboard"
        return view('dashboard.index', compact('projects', 'tasks'));
    }
}
