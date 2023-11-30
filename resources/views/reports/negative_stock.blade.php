@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center">
            <h4>Relatório de Estoque Negativo</h4>
        </div>
        <div class="col-12 text-center mt-2 mt-md-0">
            <a class="btn btn-primary" onclick="imprimirNegativeStock()"><i class="fa-solid fa-print pe-2"></i>Imprimir</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table table-hover text-center" id="negativeStock">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Qtd.Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection