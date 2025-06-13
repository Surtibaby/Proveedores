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
        Schema::create('negociacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id');
            $table->string('regimen_impuestos_venta');
            $table->string('iva_incluido');
            $table->string('por_descuento');
            $table->string('plazo_descuento');
            $table->string('detalles_descuento');
            $table->string('dto_pie_factura');
            $table->string('genera_guia');
            $table->string('flete_100_proveedor');
            $table->string('flete_100_empresa');
            $table->string('flete_50_50');
            $table->string('plazo_garantia_tienda');
            $table->string('condiciones_garantia_tienda');
            $table->string('plazo_garantia_cliente');
            $table->string('condiciones_garantia_cliente');
            $table->string('tipo_retiro');
            $table->string('nombre_transportadora');
            $table->string('convenio_transportadora');
            $table->foreign('proveedor_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negociacions');
    }
};
