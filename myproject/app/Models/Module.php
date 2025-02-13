<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'submodules', 'coefficient'];

    // Relation avec les sous-modules
    public function submodules()
    {
        return $this->hasMany(Submodule::class); // Un module a plusieurs sous-modules
    }
}
