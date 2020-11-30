<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function entrar(Request $req)
    {
        $dados = $req->all();
        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])) {
            return redirect()->route('admin.noticias');
        }
        return redirect()->back()->with(['erro' => 'Erro, login ou senha invalidos!']);
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
