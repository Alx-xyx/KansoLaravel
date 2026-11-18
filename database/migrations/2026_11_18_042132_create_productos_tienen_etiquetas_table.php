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
        Schema::create('productos_tienen_etiquetas', function (Blueprint $table) {
            $table->foreignId('producto_fk')->constrained('productos', 'producto_id');
            $table->unsignedSmallInteger('etiqueta_fk');
            $table->foreign('etiqueta_fk')->references('etiqueta_id')->on('etiquetas');
            $table->timestamps();
            $table->primary(['producto_fk', 'etiqueta_fk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_tienen_etiquetas');
    }
};
