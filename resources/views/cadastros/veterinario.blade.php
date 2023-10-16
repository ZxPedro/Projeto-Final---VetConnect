@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <h1>Cadastro de Veterinarios</h1>
        <form method="post" action="#">
            @csrf
            <div class="form-group">
                <label for="users" class="form-label mt-4">Usuários</label>
                <select class="form-select" id="users" name="users">
                    <!-- Colocar aqui a leitura dos usuarios -->
                    <option value="João"> João </option>
                    <option value="Maria"> Maria </option>
                    <option value="José"> José </option>
                    <option value="Paulo"> Paulo </option>
                </select>
            </div>
            <fieldset class="form-group">
                <label class="form-label mt-4">Dias da semana que o Veterinario trabalha</label>
                <div class="row">
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="segunda" name="segunda">
                            <label class="form-check-label" for="segunda">Segunda</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="terca" name="terca">
                            <label class="form-check-label" for="terca">Terça</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="quarta" name="quarta">
                            <label class="form-check-label" for="quarta">Quarta</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="quinta" name="quinta">
                            <label class="form-check-label" for="quinta">Quinta</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="sexta" name="sexta">
                            <label class="form-check-label" for="sexta">Sexta</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="sabado" name="sabado">
                            <label class="form-check-label" for="sabado">Sabado</label>
                        </div>
                    </div>                    
                </div>
            </fieldset>


            <fieldset class="form-group">
                <label class="form-label mt-4">Especialidades</label>
                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="cirurgia" name="cirurgia">
                            <label class="form-check-label" for="cirurgia">Cirurgia</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="trauma" name="trauma">
                            <label class="form-check-label" for="trauma">Trauma</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="oncologia" name="oncologia">
                            <label class="form-check-label" for="oncologia">Oncologia</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="geral" name="geral">
                            <label class="form-check-label" for="geral">Geral</label>
                        </div>
                    </div>                           
                </div>
            </fieldset> 
            <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
        </form>
    </div>
</div>
@endsection