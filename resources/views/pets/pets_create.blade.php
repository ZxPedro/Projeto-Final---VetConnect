@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <h2 class="text-center mt-5">Cadastro de Pets</h2>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif
        <form method="post" action="{{ isset($pet) ? route('update-pet', $pet->id) : route('pet-create')}}">
            @csrf
            <input type="hidden" class="form-control" name="customer_id" id="customer_id" value="{{isset($pet->customer_id) ? $pet->customer_id : $customer_id}}">
            <div class="form-group">
                <label for="name" class="form-label mt-4">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do Pet" value="{{ isset($pet->name) ? $pet->name : ''  }}">
            </div>
            <div class="form-group">
                <label for="data_nascimento" class="form-label mt-4">Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" aria-describedby="data_nascimentoHelp" value="{{ isset($pet->data_nascimento) ? $pet->data_nascimento : ''  }}">
            </div>
            <div class="form-group">
                <label for="especies" class="form-label mt-4">Espécie</label>
                <select class="form-select" id="especie" name="especie">

                    @foreach($especies as $codigo => $nome)
                    <option value="{{ $codigo }}" {{ isset($pet->especie) ? $pet->especie == $codigo ? 'selected' : '' : ''}}> {{ $nome }} </option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="racas" class="form-label mt-4">Raça</label>
                <select class="form-select" id="raca" name="raca">

                    <option value="{{ isset($pet->raca) }}"></option>

                </select>
            </div>
            <fieldset class="form-group">
                <label class="form-label mt-4">Restrições</label>
                <div class="row">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flagidoso" name="flagidoso" {{ isset($pet->flagidoso) ? $pet->flagidoso == 1 ? 'checked' : '' : ''}}>
                            <label class="form-check-label" for="flagidoso">
                                Idoso
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flagcardiopata" name="flagcardiopata" {{  isset($pet->flagcardiopata) ? $pet->flagcardiopata == 1 ? 'checked' : '' : ''}}>
                            <label class="form-check-label" for="flagcardiopata">
                                Cardiopata
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flagepiletico" name="flagepiletico" {{ isset($pet->flagepiletico) ? $pet->flagepiletico == 1 ? 'checked' : '' : ''}}>
                            <label class="form-check-label" for="flagepiletico">
                                Epilético
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flaglesionado" name="flaglesionado" {{ isset($pet->flaglesionado) ? $pet->flaglesionado == 1 ? 'checked' : '' : '' }}>
                            <label class="form-check-label" for="flaglesionado">
                                Lesionado
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flagalergico" name="flagalergico" {{ isset($pet->flagalergico) ? $pet->flagalergico == 1 ? 'checked' : '' : '' }}>
                            <label class="form-check-label" for="flagalergico">
                                Alérgico
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="observacao" class="form-label mt-4">Observações</label>
                <textarea class="form-control" id="observacao" name="observacao" rows="3">{{ isset($pet->observacao) ?  $pet->observacao : '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
        </form>


    </div>
</div>

@endsection