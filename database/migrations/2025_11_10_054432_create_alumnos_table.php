<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellidos', 100);
            $table->string('telefono', 15);
            $table->string('correo', 100)->unique();
            $table->date('fecha_nacimiento');
            $table->decimal('nota_media', 3, 2);
            $table->text('experiencia')->nullable();
            $table->text('formacion')->nullable();
            $table->text('habilidades')->nullable();
            $table->string('fotografia')->nullable();
            $table->timestamps();
        });
    }
};