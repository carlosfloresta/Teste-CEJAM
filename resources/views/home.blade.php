@extends('layout.template')

@section('titulo', 'Home')

@section('home-selecionado', 'active')

@section('body')
    <section class="container">
        <br>
        <br>
        @foreach($noticias as $noticia)
        <div class="card">
            <div class="card-header">
              Autor: {{$noticia->autores->nome}} Data de inclusão: {{$noticia->created_at}} Data de atualização: {{$noticia->updated_at}}
            </div>
            <div class="card-body">
            <h5 class="card-title">{{$noticia->titulo_noticia}}</h5>
              <p class="card-text">{{$noticia->descricao_noticia}}</p>
            
            </div>
            <div class="card-header">
                Categorias: @foreach ($noticia->categorias as $retorno)
                {{$retorno->nome}} ;
                @endforeach 
              </div>
          </div>
          <br><br>
          @endforeach
    </section>


@endsection
