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
        Schema::create('ofertas_laborales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('fecha_publicacion');
            $table->string('descripcion');
            $table->string('tipo_contrato');
            $table->string('modalidad');
            $table->unsignedBigInteger('rango_minimo');
            $table->unsignedBigInteger('rango_maximo');
            $table->string('beneficios');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('usuarios_id');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas_laborales');
    }
};
