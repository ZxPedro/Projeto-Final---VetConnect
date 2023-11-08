@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <h2 class="text-center mt-5">Cadastro de Profissionais</h2>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif
        <form method="post" action="{{route('professionals-create')}}">
            @csrf
            <div class="form-group">
                <label for="exampleSelect1" class="form-label mt-4">Profissional</label>
                <select class="form-select" id="user_id" name="user_id">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="working_days" class="form-label mt-4">Dias de trabalho</label>
                <select multiple="multiple" class="form-select" id="working_days" name="working_days[]">
                    <option value="segunda">Segunda-feira</option>
                    <option value="terça">Terça-feira</option>
                    <option value="quarta">Quarta-feira</option>
                    <option value="quinta">Quinta-feira</option>
                    <option value="sexta">Sexta-feira</option>
                    <option value="sabado">Sábado</option>
                    <option value="domingo">Domingo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="services_id" class="form-label mt-4">Especialidades</label>
                <select multiple="multiple" class="form-select" id="services_id" name="services_id[]">
                    @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
        </form>
    </div>
</div>

@endsection