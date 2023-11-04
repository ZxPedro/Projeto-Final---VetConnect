@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <h2 class="text-center mt-5">Cadastro de Serviços</h2>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif

        <form method="post" action="{{isset($service) ? route('service-update', $service->id) : route('services-create')}}">
            @csrf
            <div class="form-group col-md-12">
                <label for="name" class="form-label mt-4">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do serviço" value="{{isset($service->name) ? $service->name : ''}}">
            </div>
            <div class="form-group col-md-12">
                <label for="price" class="form-label mt-4">Preço</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">R$</span>
                    <input type="text" class="form-control" name="price" id="price" value="{{isset($service->price) ? $service->price : ''}}">
                </div>
            </div>

            <div class="form-group">
                <label for="category_id" class="form-label mt-4">Categoria</label>
                <select class="form-select" id="category_id" name="category_id">
                    <!-- Colocar aqui a leitura dos usuarios -->
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ isset($service->category) ? $service->category->id === $category->id ? 'selected' : '' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">{{isset($service) ? 'Atualizar' : 'Cadastrar'}}</button>
        </form>


    </div>
</div>

@endsection