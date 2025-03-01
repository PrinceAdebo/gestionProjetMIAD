<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'due_date',
        'status',
    ];

    /**
     * Relation Many-to-One : une Task appartient à un Project.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relation Many-to-Many : une Task peut être assignée à plusieurs Users.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user')
                    ->withTimestamps();
    }

    /**
     * Relation One-to-Many : une Task peut avoir plusieurs Files.
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
