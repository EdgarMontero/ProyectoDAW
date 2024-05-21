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
        // Users
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamps();
        });

        // Médicos
        Schema::create('medicos', function (Blueprint $table) {
            $table->string('dni_medico')->primary();  // Cambiado a string
            $table->unsignedBigInteger('user_id');
            $table->string('nombre');
            $table->string('especialidad');
            $table->string('horario');
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users');
        });

        // Pacientes
        Schema::create('pacientes', function (Blueprint $table) {
            $table->string('dni_paciente')->primary();  // Cambiado a string
            $table->unsignedBigInteger('user_id');
            $table->string('nombre');
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->string('telefono');
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users');
        });

        // Consultas
        Schema::create('consultas', function (Blueprint $table) {
            $table->id('id_consulta');
            $table->string('id_medico');  // Ajustado para corresponder al tipo string de dni_medico
            $table->string('id_paciente');  // Ajustado para corresponder al tipo string de dni_paciente
            $table->string('tipo_consulta');
            $table->text('descripcion_consulta');
            $table->date('fecha_consulta');
            $table->timestamps();

            $table->foreign('id_medico')->references('dni_medico')->on('medicos');
            $table->foreign('id_paciente')->references('dni_paciente')->on('pacientes');
        });

        // Relación Médico-Paciente
        Schema::create('relacion_medico_paciente', function (Blueprint $table) {
            $table->string('id_medico');  // Ajustado para corresponder al tipo string de dni_medico
            $table->string('id_paciente');  // Ajustado para corresponder al tipo string de dni_paciente
            $table->timestamps();

            $table->primary(['id_medico', 'id_paciente']);

            $table->foreign('id_medico')->references('dni_medico')->on('medicos');
            $table->foreign('id_paciente')->references('dni_paciente')->on('pacientes');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relacion_medico_paciente');
        Schema::dropIfExists('consultas');
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('medicos');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
