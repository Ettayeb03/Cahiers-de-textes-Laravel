<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilieresTable extends Migration
{
    public function up()
    {
            Schema::create('filieres', function (Blueprint $table) {
                $table->id(); 
                $table->string('nom_fil'); 
                $table->integer('annee'); 
                $table->timestamps(); 
            });
        
    }

    public function down()
    {
        Schema::dropIfExists('filieres');
    }
}


