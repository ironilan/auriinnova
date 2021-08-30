<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('slug')->nullable();
            $table->string('imagen')->nullable();
            $table->string('precio_antes')->nullable();
            $table->string('precio_final')->nullable();
            $table->string('estrellas')->nullable();
            $table->string('sku')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('color')->nullable();
            $table->string('codigo_color')->nullable();
            $table->string('codigo_color_filtro')->nullable();
            
            $table->string('procedencia')->nullable();
            $table->string('largo')->nullable();
            $table->string('ancho')->nullable();
            $table->string('alto')->nullable();
            $table->string('peso')->nullable();
            $table->string('material')->nullable();
            $table->string('atributos')->nullable();
            $table->string('limpieza')->nullable();
            $table->string('recomendaciones')->nullable();
            $table->string('advertencias')->nullable();

            $table->enum('nuevo', ['si', 'no'])->default('no');
            

            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->unsignedBigInteger('subcategoria_id')->nullable();
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
