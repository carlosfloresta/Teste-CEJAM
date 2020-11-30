<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Noticia;

class HomeController extends Controller
{
    public function index(){

        $noticias = Noticia::with('categorias','autores')->get();
     //   dd($noticias2);
        return view('home',compact('noticias'));
       
    }
}
