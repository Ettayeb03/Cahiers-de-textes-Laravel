<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); // Colonne optionnelle pour vérification
            $table->string('password');
            $table->string('role')->default('prof'); // Définit le rôle par défaut comme 'prof'
            $table->string('firstname')->nullable(); // Colonne firstname
            $table->string('lastname')->nullable(); // Colonne lastname
            $table->string('phone')->nullable(); // Colonne phone
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
