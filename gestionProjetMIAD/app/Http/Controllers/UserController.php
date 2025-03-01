<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Liste les utilisateurs (réservé à l'admin).
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Affiche un formulaire de création d'un utilisateur (admin).
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Enregistre un nouvel utilisateur (admin).
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id'  => 'required|exists:roles,id'
        ]);

        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id  = $request->role_id;
        $user->save();

        return redirect()->route('users.index')
                         ->with('success', 'Utilisateur créé avec succès!');
    }

    /**
     * Affiche un utilisateur spécifique.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Formulaire pour éditer un utilisateur.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Met à jour un utilisateur.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,'.$id,
            'role_id'  => 'required|exists:roles,id'
        ]);

        $user = User::findOrFail($id);
        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->role_id = $request->role_id;

        // Mettre à jour le password si renseigné
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:6'
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.index')
                         ->with('success', 'Utilisateur mis à jour avec succès!');
    }

    /**
     * Supprime un utilisateur.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
                         ->with('success', 'Utilisateur supprimé avec succès!');
    }
}
