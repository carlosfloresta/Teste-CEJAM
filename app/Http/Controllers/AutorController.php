<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Autor;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return view('admin.autor.index', compact('autores'));
    }

    public function create(Request $req)
    {
        $nome =  $req->input('nome');
        $dados =  $req->all();

        if (Autor::where('nome', $nome)->count() == 0) {
            Autor::create($dados);
            return redirect()->route('admin.autores');
        } else {
            return redirect()->back()->with(['erro' => 'Você já adicionou esse autor, não é possivel adicionar categoria com o mesmo nome']);
        }
    }

    public function update(Request $req, $id)
    {
        $nome =  $req->input('nome');
        $dados =  $req->all();

        if (Autor::where('nome', $nome)->count() == 0) {
            Autor::find($id)->update($dados);
            return redirect()->route('admin.autores');
        } else {
            return redirect()->back()->with(['erro' => 'Você já adicionou esse autor, não é possivel atualizar autor com o mesmo nome']);
        }
    }

    public function delete($id)
    {
        Autor::find($id)->delete();
        return redirect()->route('admin.autores');
    }
}
