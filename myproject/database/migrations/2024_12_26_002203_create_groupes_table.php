<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupesTable extends Migration
{
    public function up()
    {
            Schema::create('groupes', function (Blueprint $table) {
                $table->id(); 
                $table->string('nom_grp'); 
                $table->string('annee');
                $table->unsignedBigInteger('filiere_id'); 
                $table->timestamps(); 
                $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
            });
    }

    public function down()
    {
        Schema::dropIfExists('groupes');
    }
}

