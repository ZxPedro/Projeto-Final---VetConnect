@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <h2 class="text-center mt-5">Cadastro de Clientes</h2>

            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
            @endif

            <form method="post" action="{{ route('customer-create')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label mt-4">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do cliente" value="">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label mt-4">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite um e-mail valido">
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label mt-4">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfHelp" placeholder="Digite o CPF do cliente ">
                </div>
                <div class="mb-3">
                    <label for="data_nascimento" class="form-label mt-4">Data de Nascimento</label>
                    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" aria-describedby="data_nascimentoHelp" placeholder="Informa a data de nascimento">
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label mt-4">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="telefoneHelp" placeholder="Informe o telefone">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label mt-4">Gênero</label>
                    <select class="form-select" id="genero" name="genero">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                        <option value="O">Outros</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

@endsection