@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <h1>Agendamento</h1>
        <form method="post" action="#">
            @csrf
            <div class="form-group">
                <label for="cliente" class="form-label mt-4">Cliente</label>
                <select class="form-select" id="cliente" name="cliente">
                    <!-- Colocar aqui a leitura dos clientes -->
                    <option value="João"> João </option>
                    <option value="Maria"> Maria </option>
                    <option value="José"> José </option>
                    <option value="Paulo"> Paulo </option>
                </select>
            </div>
            <div class="form-group">
                <label for="pet" class="form-label mt-4">Pet</label>
                <select class="form-select" id="pet" name="pet">
                    <!-- Colocar aqui a leitura dos pets do clientes -->
                    <option value="Gil"> Gil </option>
                    <option value="Fiona"> Fiona </option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_atendimento" class="form-label mt-4">Tipo de atendimento</label>
                <select class="form-select" id="tipo_atendimento" name="tipo_atendimento">
                    <!-- Colocar aqui a leitura dos tipos de atendimento -->
                    <option value="consulta"> Consulta </option>
                    <option value="vacina"> Vacina </option>
                    <option value="medicacao_oral"> Medicação oral </option>
                    <option value="medicacao_injetavel"> Medicação injetavel </option>
                </select>
            </div>
            <!-- Colocar aqui a leitura dos valores que vem dos atendimentos -->
            <div class="form-group col-md-12">
                <label for="preco" class="form-label mt-4">Preço</label>
                <input type="text" class="form-control" name="preco" id="preco" value="80,00">
            </div>
            <div class="form-group col-md-12">
                <label for="veterinario" class="form-label mt-4">Veterinario</label>
                <select class="form-select" id="veterinario" name="veterinario">
                    <!-- Colocar aqui a leitura dos veterinarios -->
                    <option value="Claudio"> Claudio da Silva </option>
                    <option value="Joana"> Joana Dark </option>
                </select>
            </div>
            <div class="form-group">
                <label for="data_agendamento" class="form-label mt-4">Data do agendamento</label>
                <input type="date" class="form-control" name="data_agendamento" id="data_agendamento" aria-describedby="data_agendamentoHelp">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Agendar</button>
        </form>
    </div>
</div>
@endsection