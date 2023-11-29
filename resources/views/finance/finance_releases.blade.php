@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container mt-5">
    <div class="row mt-3">
        <div class="col-12 text-center">
            <h4>Lançamentos Financeiros</h4>
        </div>
        <div class="col-12 text-end mt-3">
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#release"><i class="fa-solid fa-plus pe-2"></i>Novo Lançamento</a>
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

    <div class="row mt-3">
        <div class="col-12 col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Receitas - R$ {{$total_receitas}}</div>
                <div class="card-body">
                    <table class="table table-hover mt-3 text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receitas as $receita)
                            <tr class="table-primary">
                                <td>{{$receita['name']}}</td>
                                <td>R$ {{$receita['price']}}</td>
                                <td>
                                    <a href="#" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    <form action="#" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-ban"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mt-3 mt-md-0">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Despesas - R$ {{$total_despesas}}</div>
                <div class="card-body">
                    <table class="table table-hover mt-3 text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($despesas as $despesa)
                            <tr class="table-secondary">
                                <td>{{$despesa->name}}</td>
                                <td>R$ -{{$despesa->price}}</td>
                                <td>
                                    <a href="#" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    <form action="#" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-ban"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="release">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tipo de Lançamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('post-finance')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label mt-4">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome da categoria" value="">
                        </div>
                        <div class="form-group">
                            <label for="observacao" class="form-label mt-4">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="price" class="form-label mt-4">Preço</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">R$</span>
                                <input type="text" class="form-control" name="price" id="price" value="">
                            </div>
                        </div>
                        <fieldset class="form-group row mt-3 justify-content-center">
                            <div class="form-check col-2 me-2">
                                <input class="form-check-input" type="radio" name="type" id="optionEntrada" value="C" checked="">
                                <label class="form-check-label" for="optionEntrada">
                                    Crédito
                                </label>
                            </div>
                            <div class="form-check col-2">
                                <input class="form-check-input" type="radio" name="type" id="optionSaida" value="D">
                                <label class="form-check-label" for="optionSaida">
                                    Débito
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
</div>

@endsection