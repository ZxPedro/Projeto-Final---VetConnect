@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center ">
    <div class="row mt-3">
        <div class="col-4">
            <h4>Relatório de Estoque Negativo</h4>
        </div>
    </div>
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

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection