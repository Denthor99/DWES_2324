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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',35);
            $table->string('apellidos',45);
            $table->date('fechNacimiento');
            $table->char('telefono',13);
            $table->string('poblacion',25);
            $table->string('email',35)->unique();
            $table->char('dni',9)->unique();
            $table->unsignedBigInteger('curso_id');
            $table->timestamps();
        });
        if (Schema::hasTable('cursos')) {
            Schema::table('alumnos', function (Blueprint $table) {
                $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('restrict')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
