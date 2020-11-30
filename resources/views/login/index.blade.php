@extends('layout.template')

@section('titulo', 'Login')

@section('body')
    <section class="container">
        <br>
        <br>
        <!-- Alerta erro -->
        @if (session()->has('erro'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('erro') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
        @endif
        <form method="post" action="{{ route('login.entrar') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    required>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" name="senha" class="form-control" id="exampleInputPassword1" required>
            </div>

            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </section>
@endsection
