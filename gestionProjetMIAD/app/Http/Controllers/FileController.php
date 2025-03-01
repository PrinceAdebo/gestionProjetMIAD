<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Task;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Upload d'un fichier pour une tâche donnée.
     */
    public function store(Request $request, $taskId)
    {
        $request->validate([
            'document' => 'required|file|max:2048', // 2Mo max, par ex.
        ]);

        $task = Task::findOrFail($taskId);

        $uploadedFile = $request->file('document');
        // Stockage local (disque "public") avec un dossier "tasks/ID"
        $path = $uploadedFile->store("tasks/{$task->id}", 'public');

        // Création de l'enregistrement dans la table files
        $file = new File();
        $file->task_id       = $task->id;
        $file->file_path     = $path; 
        $file->original_name = $uploadedFile->getClientOriginalName();
        $file->mime_type     = $uploadedFile->getMimeType();
        $file->save();

        return redirect()->back()->with('success', 'Fichier uploadé avec succès!');
    }

    /**
     * Télécharger un fichier.
     */
    public function download($id)
    {
        $file = File::findOrFail($id);

        // Vérifier l'existence du fichier dans le disque
        if (!Storage::disk('public')->exists($file->file_path)) {
            return redirect()->back()->with('error', 'Fichier introuvable.');
        }

        // Renvoie le fichier en téléchargement
        return Storage::disk('public')->download($file->file_path, $file->original_name);
    }

    /**
     * Afficher le fichier dans le navigateur (ex. PDF/image).
     * Optionnel, si vous souhaitez intégrer un preview.
     */
    public function show($id)
    {
        $file = File::findOrFail($id);

        if (!Storage::disk('public')->exists($file->file_path)) {
            return redirect()->back()->with('error', 'Fichier introuvable.');
        }

        // Retourne une réponse HTTP pour afficher le fichier inline
        $content = Storage::disk('public')->get($file->file_path);
        $mime = $file->mime_type;

        return response($content, 200)->header('Content-Type', $mime);
    }

    /**
     * Supprimer un fichier.
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        // Supprimer du disque
        Storage::disk('public')->delete($file->file_path);
        // Supprimer de la base
        $file->delete();

        return redirect()->back()->with('success', 'Fichier supprimé avec succès!');
    }
}
