<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categoria.index', compact('categorias'));
    }

    public function create(Request $req)
    {
        $nome =  $req->input('nome');
        $dados =  $req->all();

        if (Categoria::where('nome', $nome)->count() == 0) {
            Categoria::create($dados);
            return redirect()->route('admin.categorias');
        } else {

            return redirect()->back()->with(['erro' => 'Você já adicionou essa categoria, não é possivel adicionar categoria com o mesmo nome']);
        }
    }

    public function update(Request $req, $id)
    {
        $nome =  $req->input('nome');
        $dados =  $req->all();

        if (Categoria::where('nome', $nome)->count() == 0) {
            Categoria::find($id)->update($dados);
            return redirect()->route('admin.categorias');
        } else {
            return redirect()->back()->with(['erro' => 'Você já adicionou essa categoria, não é possivel atualizar categoria com o mesmo nome']);
        }
    }

    public function delete($id)
    {
        Categoria::find($id)->delete();
        return redirect()->route('admin.categorias');
    }
}
