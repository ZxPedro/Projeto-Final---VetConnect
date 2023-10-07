@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <h2 class="text-center mt-5">Cadastro de Pets</h2>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning">
            {{ $error }}
        </div>
        @endforeach
        @endif
        <form method="post" action="{{route('pet-create')}}">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label mt-4">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome" value="">
            </div>
            <div class="form-group">
                <label for="data_nascimento" class="form-label mt-4">Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" aria-describedby="data_nascimentoHelp" placeholder="Digite seu e-mail">
            </div>
            <div class="form-group">
                <label for="especie" class="form-label mt-4">Espécie</label>
                <select class="form-select" id="especie" name="especie">
                    <option value="">AAA</option>
                    <option value="">BBB</option>
                    <option value="">CCC</option>
                </select>
            </div>
            <div class="form-group">
                <label for="especie" class="form-label mt-4">Raça</label>
                <select class="form-select" id="especie" name="especie">
                    <option value="">AAA</option>
                    <option value="">BBB</option>
                    <option value="">CCC</option>
                </select>
            </div>
            <fieldset class="form-group">
                <label class="form-label mt-4">Restrições</label>
                <div class="row">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Idoso
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Cardiopata
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Epilético
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Lesionado
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Alérgico
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4">Observações</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
        </form>


    </div>
</div>

@endsection