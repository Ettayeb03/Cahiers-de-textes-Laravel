<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submodule extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'module_id']; // 'module_id' comme clé étrangère

    // Relation avec le module
    public function module()
    {
        return $this->belongsTo(Module::class); // Un sous-module appartient à un module
    }
}
