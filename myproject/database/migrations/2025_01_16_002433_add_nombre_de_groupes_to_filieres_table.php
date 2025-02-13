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
    Schema::table('filieres', function (Blueprint $table) {
        $table->integer('nombre_de_groupes')->nullable(); // Ajout de la colonne
    });
}

public function down()
{
    Schema::table('filieres', function (Blueprint $table) {
        $table->dropColumn('nombre_de_groupes'); // Si on veut revenir en arrière
    });
}

};
