<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('profs', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email'); 
            $table->string('password');
            $table->string('phone');
            $table->unsignedBigInteger('user_id')->nullable(); // Clé étrangère optionnelle
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Contrainte de clé étrangère
            $table->timestamps(); // Colonnes created_at et updated_at
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('profs');
    }
}
