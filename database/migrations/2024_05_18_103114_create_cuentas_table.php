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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id');
            $table->string('nit');
            $table->string('banco');
            $table->string('numero_cuenta');
            $table->string('numero_convenio');
            $table->string('titular_cuenta');
            $table->string('tipo_cuenta');
            $table->string('formato');
            $table->string('observaciones');
            $table->string('cuenta_base64');
            $table->string('fecha_creacion');
            $table->string('fecha_modificacion');
            $table->foreign('proveedor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cuenta_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};
