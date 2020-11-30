<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Autor;

class Noticia extends Model
{

    public function autores(){

        return $this->belongsTo(Autor::class,'id_autor');

    }

    public function categorias(){

        return $this->belongsToMany(Categoria::class,'noticia_categorias','id_noticia','id_categoria');

    }

 
    protected $fillable = [
        'titulo_noticia',
        'descricao_noticia',
        'categoria_noticia',
        'id_autor',
        'publicado'
    ];
}
