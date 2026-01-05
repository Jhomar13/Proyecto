<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('IDPRO');
            $table->integer('IDCAT')->nullable();
            $table->text('CODBARRASPRO', 13);
            $table->string('NOMBREPRO', 60);
            $table->decimal('PRECIOMINPRO', 10, 2);
            $table->decimal('PRECIOMAXPRO', 10, 2);
            $table->integer('STOCKPRO');
            $table->boolean('ESTADOCATPRO');
            $table->decimal('PRECIOCOMPRAPRO', 10, 2);
            $table->decimal('PRECIOVENTAPRO', 10, 2);
            $table->integer('STOCKMINPRO');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};