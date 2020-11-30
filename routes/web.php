<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login/entrar', [LoginController::class,'entrar'])->name('login.entrar');
Route::get('/login/sair', [LoginController::class,'sair'])->name('login.sair');



Route::group(['middleware'=>'auth'],function(){

//rotas categorias
Route::get('/admin/categorias', [CategoriaController::class,'index'])->name('admin.categorias');
Route::post('/admin/categorias/adicionar', [CategoriaController::class,'create'])->name('admin.categorias.adicionar');
Route::put('/admin/categorias/editar/{id}', [CategoriaController::class,'update'])->name('admin.categorias.editar');
Route::get('/admin/categorias/apagar/{id}', [CategoriaController::class,'delete'])->name('admin.categorias.deletar');

//rotas autores
Route::get('/admin/autores', [AutorController::class,'index'])->name('admin.autores');
Route::post('/admin/autores/adicionar', [AutorController::class,'create'])->name('admin.autores.adicionar');
Route::put('/admin/autores/editar/{id}', [AutorController::class,'update'])->name('admin.autores.editar');
Route::get('/admin/autores/apagar/{id}', [AutorController::class,'delete'])->name('admin.autores.deletar');

//rotas noticias
Route::get('/admin/noticias', [NoticiasController::class,'index'])->name('admin.noticias');
Route::post('/admin/noticias/adicionar', [NoticiasController::class,'create'])->name('admin.noticias.adicionar');
Route::put('/admin/noticias/editar/{id}', [NoticiasController::class,'update'])->name('admin.noticias.editar');
Route::get('/admin/noticias/apagar/{id}', [NoticiasController::class,'delete'])->name('admin.noticias.deletar');

});