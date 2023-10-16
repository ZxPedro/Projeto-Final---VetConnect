@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <h1>Cadastro de serviços</h1>
        <form method="post" action="#">
            @csrf            
            <div class="form-group col-md-12">
                <label for="novo_servico" class="form-label mt-4">Novo serviço</label>
                <input type="text" class="form-control" name="novo_servico" id="novo_servico" placeholder="Digite o nome do novo serviço">
            </div>
            <div class="form-group col-md-12">
                <label for="preco" class="form-label mt-4">Preço</label>
                <input type="text" class="form-control" name="preco" id="preco" placeholder="Digite o preço da consulta">
            </div>

            <div class="form-group">
                <label for="categoria" class="form-label mt-4">Categoria</label>
                <select class="form-select" id="categoria" name="categoria">
                    <!-- Colocar aqui a leitura dos usuarios -->
                    <option value="Cirurgia"> Cirurgia </option>
                    <option value="Trauma"> Trauma </option>
                    <option value="Oncologia"> Oncologia </option>
                    <option value="Geral"> Geral </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
        </form>        
    </div>
</div>
@endsection