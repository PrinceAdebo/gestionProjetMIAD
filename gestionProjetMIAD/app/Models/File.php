<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'file_path',
        'original_name',
        'mime_type',
    ];

    /**
     * Relation Many-to-One : un Fichier appartient à une Task.
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
