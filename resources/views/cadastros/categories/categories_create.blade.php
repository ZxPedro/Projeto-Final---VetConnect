@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Cadastro de Categorias</h2>

            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
            @endif

            <form method="post" action="{{ isset($category) ? route('categories-update', $category->id) : route('categories-create')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label mt-4">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome da categoria" value="{{ isset($category->name) ? $category->name : '' }}">
                </div>
                <button type="submit" class="btn btn-primary mt-2">{{ isset($category) ? 'Atualizar' : 'Cadastrar'}}</button>
            </form>
        </div>
    </div>
</div>

@endsection