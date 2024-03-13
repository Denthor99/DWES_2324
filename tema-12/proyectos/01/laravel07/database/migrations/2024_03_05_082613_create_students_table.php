<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->string('lastname', 60);
            $table->date('birth_date');
            $table->char('phone', 13)->nullable(); // Corregido para permitir nulos
            $table->char('dni', 9)->unique()->nullable(false);
            $table->string('city', 40);
            $table->string('email', 40)->unique();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete("restrict")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students'); // Corregido para eliminar la tabla correcta
    }
};