<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = ['nom_fil', 'annee', 'nombre_de_groupes'];

    // Relation avec les groupes
    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }

    // Relation avec les professeurs (via une table pivot)
    public function profs()
    {
        return $this->belongsToMany(Prof::class, 'filiere_prof'); // Table pivot 'filiere_prof'
    }

    // Relation avec les modules (via une table pivot)
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'filiere_module'); // Table pivot 'filiere_module'
    }

    public function cahiers()
    {
        return $this->hasMany(Task::class);
    }
}
