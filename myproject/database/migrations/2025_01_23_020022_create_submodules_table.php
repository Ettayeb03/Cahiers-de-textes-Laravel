<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('submodules', function (Blueprint $table) {
        $table->id();
        $table->string('name');  // Nom du sous-module
        $table->foreignId('module_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table modules
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('submodules');
}

};
