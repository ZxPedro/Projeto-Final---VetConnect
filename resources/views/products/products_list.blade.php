@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center ">
    <div class="row mt-3">
        <div class="col-4">
            <h4>Lista de Produtos</h4>
        </div>
        <div class="col-4 text-center">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Produto" aria-label="" aria-describedby="button-addon2" id="">
                <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="col-4 text-end">
            <a href="{{route('view-product-create')}}" class="btn btn-primary"><i class="fa-solid fa-plus pe-2"></i>Cadastrar</a>
        </div>
    </div>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
    @endif
    <div class="row">
        <div class="col-12">


            <table class="table table-hover mt-3 text-center" id="">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Qtd.Estoque</th>
                        <th scope="col">Qtd.Segurança</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->amount}}</td>
                        @if($product->amount > $product->security_amount)
                        <td><i class="fa-solid fa-circle-check" style="color: #009919;"></i></td>
                        @else
                        <td><i class="fa-solid fa-ban fa-beat" style="color: #eb0000;"></i></td>
                        @endif
                        <td>
                            <a href="{{route('product-edit', $product->id)}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{route('product-delete', $product->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            <a href="" class="btn btn-info" data-bs-toggle="modal" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}" data-bs-target="#ModalStockEntryAndExit"><i class="fa-solid fa-bars"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="ModalStockEntryAndExit">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Entrada e Saída de Produtos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Produto: <strong id="productName"></strong></p>
                        <form action="{{route('product-stock')}}" method="post">
                            @csrf
                            <input type="hidden" id="productIdModal" value="" name="product_id">
                            <input type="number" min="0" class="form-control" name="amount" id="amount" placeholder="Digite a quantidade a ser inserida/retirada" value="">
                            <fieldset class="form-group row mt-3 justify-content-center">
                                <div class="form-check col-2 me-2">
                                    <input class="form-check-input" type="radio" name="option_id" id="optionEntrada" value="0" checked="">
                                    <label class="form-check-label" for="optionEntrada">
                                        Entrada
                                    </label>
                                </div>
                                <div class="form-check col-2">
                                    <input class="form-check-input" type="radio" name="option_id" id="optionSaida" value="1">
                                    <label class="form-check-label" for="optionSaida">
                                        Saída
                                    </label>
                                </div>

                            </fieldset>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary ">Concluir</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col pagination justify-content-end">

                {{$products->links()}}
            </div>
        </div>

    </div>
</div>

@endsection