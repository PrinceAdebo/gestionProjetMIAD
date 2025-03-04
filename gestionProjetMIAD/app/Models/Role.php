<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Si vous voulez autoriser la création/mise à jour en masse
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Un rôle peut être attribué à plusieurs utilisateurs.
     * Relation One-to-Many : roles -> users
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
