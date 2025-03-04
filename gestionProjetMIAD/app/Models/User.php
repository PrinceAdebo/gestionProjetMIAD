<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role; 
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relation avec le modèle Role (un user a un seul rôle).
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relation Many-to-Many avec Project (via la table pivot project_user).
     * Un utilisateur peut appartenir à plusieurs projets,
     * et un projet peut avoir plusieurs utilisateurs.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user')
                    ->withTimestamps()
                    ->withPivot('role_in_project'); 
        // 'role_in_project' est un exemple si vous stockez le rôle du user dans le pivot
    }

    /**
     * Relation Many-to-Many avec Task (via la table pivot task_user).
     * Un user peut être assigné à plusieurs tâches.
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_user')
                    ->withTimestamps();
    }
}

