@extends('layout.template')

@section('titulo', 'Noticias')

@section('noticias-selecionado', 'active')

@section('body')
    <section class="container">
        <br>
        <!-- Alerta erro -->
        @if (session()->has('erro'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('erro') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
        @endif
        <!-- FIM Alerta erro -->
        <button type="button" class="btn btn-success" data-toggle="modal"
            data-target=".bd-example-modal-lg">Adicionar</button>
        <!-- Modal adicionar noticia -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form adicionar noticia -->
                        <form method="POST" action="{{ route('admin.noticias.adicionar') }}" 
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('admin.forms.formNoticia')
                            <button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- FIM Modal adicionar noticia -->
        <br><br>
        <div class="table-responsive-xl">
            <table class="table">
                <caption>List of users</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Publicado?</th>
                        <th scope="col">Data/hora Adicionado</th>
                        <th scope="col">Data/hora Atualizado</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noticias as $noticia)
                        <tr>

                            <th>{{ $noticia->id }}</th>
                            <td>{{ $noticia->titulo_noticia }}</td>
                            <td>{{ $noticia->autores->nome}}</td>
                            <td>{{ $noticia->publicado}}</td>
                            <td>{{ $noticia->created_at }}</td>
                            <td>{{ $noticia->updated_at }}</td>
                            <td><button class="btn btn-dark" data-toggle="modal"
                                    data-target=".editar{{ $noticia->id }}">Editar</button>
                                <button data-toggle="modal" data-target=".excluir{{ $noticia->id }}"
                                    class="btn btn-danger">Apagar</button>
                            </td>
                        </tr>
                        <!-- Modal editar noticia -->
                        <div class="modal fade editar{{ $noticia->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Categoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form adicionar noticias -->
                                        <form method="POST" action="{{ route('admin.noticias.editar', $noticia->id) }}"
                                            class="form-inline" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="put">
                                            
                                            @include('admin.forms.formNoticia')
                                            <button type="submit" class="btn btn-primary mb-2">Editar</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM Modal editar noticias -->

                        <!-- Modal excluir noticias -->
                        <div class="modal fade excluir{{ $noticia->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Excluir Categoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Deseja realmente excluir a categoria: {{ $noticia->nome }}</h5>

                                        <a href="{{ route('admin.noticias.deletar', $noticia->id) }}"
                                            style="width: 100%" type="submit" class="btn btn-danger">Excluir</a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM Modal excluir noticias -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection