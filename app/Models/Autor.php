<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use \App\Models\Noticia;

class Autor extends Model
{

  //  public function noticias(){

   //    return $this->hasMany(Noticia::class,'id_autor');

    //}
    protected $fillable = [
        'nome'
        
    ];
}
