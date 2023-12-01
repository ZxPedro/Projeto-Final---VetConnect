@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center ">
    <div class="row mt-3">
        <div class="col-4">
            <h4>Lista de Profissionais</h4>
        </div>
        <div class="col-4 text-center">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nome" id="searchProfessional" aria-describedby="button-addon2" id="">
                <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="col-4 text-end">
            <a href="{{route('view-professionals-create')}}" class="btn btn-primary"><i class="fa-solid fa-plus pe-2"></i>Cadastrar</a>
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


            <table class="table table-hover mt-3 text-center" id="resultTableProfessional">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Especialidades</th>
                        <th scope="col">Escala</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    @if($user->categories_user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->categories_user}} Especialidade(s)</td>
                        <td>{{$user->working_days}} Dia(s)</td>
                        <td>
                            <a href="{{route('professionals-edit', $user->id)}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{route('professional-delete', $user->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <div class="col pagination justify-content-end">


            </div>
        </div>
    </div>
</div>

@endsection