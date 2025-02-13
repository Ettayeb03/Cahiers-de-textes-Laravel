<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiliereModuleTable extends Migration
{
    public function up()
    {
        Schema::create('filiere_module', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filiere_id')->constrained('filieres')->onDelete('cascade'); // Assurez-vous que 'filieres' existe
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade'); // Assurez-vous que 'modules' existe
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('filiere_module');
    }
}
