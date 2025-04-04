<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rol');  // Usamos 'id_rol' como la columna para la llave foránea
            $table->integer('estado');  // Corregido 'integrer' por 'integer'
            $table->string('correo')->unique();  // Corregido 'corrreo' por 'correo'
            $table->string('contraseña');
            $table->timestamps();

            // Aquí se corrige la relación de la clave foránea
            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
