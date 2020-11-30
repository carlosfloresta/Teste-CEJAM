<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiaCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_noticia');
            $table->foreign('id_noticia')
                ->references('id')->on('noticias')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')
                ->references('id')->on('categorias')
                ->onDelete('cascade');
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
        Schema::dropIfExists('noticia_categorias');
    }
}
