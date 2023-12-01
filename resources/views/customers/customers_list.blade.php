@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center ">
    <div class="row mt-3">
        <div class="col-4">
            <h4>Lista de Clientes</h4>
        </div>
        <div class="col-4 text-center">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cliente" saria-describedby="button-addon2" id="searchCustomer">
                <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="col-4 text-end">
            <a href="{{ route('view-customer-create') }}" class="btn btn-primary"><i class="fa-solid fa-plus pe-2"></i>Cadastrar</a>
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


            <table class="table table-hover mt-3 text-center" id="resultTableCustomer">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->data_nascimento }}</td>
                        <td>{{ $customer->cpf }}</td>
                        <td>{{ $customer->telefone }}</td>
                        <td>
                            <a href="{{ route('view-profile', ['id' => $customer->id ]) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('customer-delete', ['id'=> $customer->id]) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <div class="col pagination justify-content-end">

                {{$customers->links()}}
            </div>
        </div>
    </div>
</div>

@endsection