<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Relation One-to-Many : un Project peut avoir plusieurs Tasks.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Relation Many-to-Many : un Project peut appartenir à plusieurs Users
     * (membres, admin, etc.), via la table pivot project_user.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user')
                    ->withTimestamps()
                    ->withPivot('role_in_project');
    }
}
