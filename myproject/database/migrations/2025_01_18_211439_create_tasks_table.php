<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->text('contenu'); // Contenu du travail
            $table->unsignedBigInteger('prof_id'); // Clé étrangère pour le professeur
            $table->unsignedBigInteger('groupe_id'); // Clé étrangère pour le groupe
            $table->unsignedBigInteger('filiere_id'); // Clé étrangère pour la filière
            $table->timestamps(); // Colonnes created_at et updated_at

            // Clés étrangères
            $table->foreign('prof_id')->references('id')->on('profs')->onDelete('cascade');
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
            $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
