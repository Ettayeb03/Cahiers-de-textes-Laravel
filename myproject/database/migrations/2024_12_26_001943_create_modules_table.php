<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('modules', function (Blueprint $table) {
        $table->id(); // Clé primaire auto-incrémentée
        $table->string('name');
        $table->text('submodules')->nullable(); // Stocker les sous-modules (en texte)
        $table->decimal('coefficient', 5, 2)->default(1.0); // Coefficient avec 2 décimales
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
