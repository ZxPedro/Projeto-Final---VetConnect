@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <h2 class="text-center mt-5">Cadastro de Usuário</h2>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif
        <form method="post" action="{{ route('user-create') }}">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label mt-4">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
            </div>
            <div class="form-group">
                <label for="password" class="form-label mt-4">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Senha" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="confirm_password" class="form-label mt-4">Confirmar senha</label>
                <input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Digite sua senha novamente" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
        </form>


    </div>
</div>

@endsection