<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['nom_grp', 'filiere_id', 'annee'];

    // Un groupe appartient à une filière
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    // Un groupe peut avoir plusieurs professeurs (relation many-to-many)
    public function profs()
    {
        return $this->belongsToMany(Prof::class, 'groupe_prof', 'groupe_id', 'prof_id');
    }

    // Un groupe peut avoir plusieurs modules (relation many-to-many)
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'groupe_module', 'groupe_id', 'module_id');
    }
}
