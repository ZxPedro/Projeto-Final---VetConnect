@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Cadastro de Produtos</h2>

            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
            @endif

            <form method="post" action="{{ isset($product) ? route('product-update', $product->id) :route('product-create')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label mt-4">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do produto" value="{{isset($product->name) ? $product->name : ''}}">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label mt-4">Quantidade em Estoque</label>
                    <input type="number" min="0" class="form-control" name="amount" id="amount" placeholder="Digite a quantidade em estoque" value="{{isset($product->amount) ? $product->amount : ''}}">
                </div>
                <div class="mb-3">
                    <label for="security_amount" class="form-label mt-4">Estoque de segurança</label>
                    <input type="number" min="0" class="form-control" name="security_amount" id="security_amount" placeholder="Digite a quantidade de segurança" value="{{isset($product->security_amount) ? $product->security_amount : ''}}">
                </div>

                <div class="form-group">
                    <label for="category_id" class="form-label mt-4">Categoria</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <!-- Colocar aqui a leitura dos usuarios -->
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ isset($product->category_id) ? $product->category_id == $category->id ? 'selected' : '' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">{{ isset($product) ? 'Atualizar' : 'Cadastrar'}}</button>
            </form>
        </div>
    </div>
</div>

@endsection