<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'contenu',
        'prof_id',
        'groupe_id',
        'filiere_id',
        'date',
        'heure',
    ];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class, 'prof_id');
    }
}


