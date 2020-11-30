  <!doctype html>
  <html lang="pt-br">

  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link href="{{ url('/css/style.css') }}" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

      <title>@yield('titulo')</title>

  </head>

  <header>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          @if (!Auth::guest())
              <a class="navbar-brand" href="#">Dashboard - Blog</a>
          @else
              <a class="navbar-brand" href="#">Blog</a>
          @endif
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
              aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item @yield('home-selecionado') ">
                      <a class="nav-link" href="{{ route('home') }}">Home</a>
                  </li>
                  @if (!Auth::guest())
                      <li class="nav-item @yield('categorias-selecionado') ">
                          <a class="nav-link" href="{{ route('admin.categorias') }}">Categorias</a>
                      </li>
                      <li class="nav-item @yield('autores-selecionado')">
                          <a class="nav-link" href="{{ route('admin.autores') }}">Autores</a>
                      </li>
                      <li class="nav-item @yield('noticias-selecionado')">
                          <a class="nav-link" href="{{ route('admin.noticias') }}">Noticias</a>
                      </li>
              </ul>
              <span class="navbar-text">
                  <a class="btn btn-danger" href="{{ route('login.sair') }}">Sair</a>
              </span>
          @else
              <span class="navbar-text">
                  <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
              </span>
              @endif
          </div>
      </nav>
  </header>
  </div>
<body>
