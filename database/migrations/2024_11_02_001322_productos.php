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
        //
        Schema::dropIfExists('productos'); // Elimina la tabla si existe
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio');
            $table->integer('stock');
            $table->unsignedBigInteger('idCategoria');
            $table->timestamps();
            $table->softDeletes();

            //Define la relacion entre la tabla de categorias y producto
            $table->foreign('idCategoria')
                  ->references('id')
                  ->on('categorias');
                  //->onDelete('cascade'); // opcion en cascada para eliminar los productos si se elimina la categoria
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        
    }
};
