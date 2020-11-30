<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Noticia;
use \App\Models\Autor;
use \App\Models\Categoria;
use \App\Models\NoticiaCategoria;

class NoticiasController extends Controller
{
    public function index()
    {
        $noticias = Noticia::with('autores')->get();
      

        $autores = Autor::all();
        $categorias = Categoria::all();
       // $noticias = Noticia::all();
     
        return view('admin.noticias.index', compact('noticias','autores','categorias'));
    }

    public function create(Request $req)
    {

       
       // $dados =  $req->all();
       $categoria = $req->input('categoria_noticia');

       // dd($categoria);

     $a = Noticia::create([
       'titulo_noticia'=>$req->input('titulo_noticia'),
       'descricao_noticia'=>$req->input('descricao_noticia'),
       'id_autor'=>$req->input('id_autor'),
       'publicado'=>$req->input('publicado')
        ]);


       $a->categorias()->attach($categoria);
        $a->save();
    
       
            return redirect()->route('admin.noticias');
        

        
    }

    public function update(Request $req, $id)
    {

        $categoria = $req->input('categoria_noticia');

         //$a =   Noticia::find($id)
         $a = Noticia::whereId($id)->first();
         
         $a->update([
                'titulo_noticia'=>$req->input('titulo_noticia'),
                'descricao_noticia'=>$req->input('descricao_noticia'),
                'id_autor'=>$req->input('id_autor'),
                'publicado'=>$req->input('publicado')
                 ]);

                 $a->categorias()->sync($categoria);
                 $a->save();

            return redirect()->route('admin.noticias');
       

        
    }

    public function delete($id)
    {

        Noticia::find($id)->delete();
        return redirect()->route('admin.noticias');
    }
}

