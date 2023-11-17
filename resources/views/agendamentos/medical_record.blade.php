@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Prontuário</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="numeroAtendimento">Número do Atendimento:</label>
                        <input type="text" class="form-control" id="numeroAtendimento" readonly value="{{isset($medical_record['id']) ? $medical_record['id'] : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="nomeCliente">Nome do Cliente:</label>
                        <input type="text" class="form-control" id="nomeCliente" readonly value="{{isset($medical_record['customer_name']) ? $medical_record['customer_name'] : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="nomeAnimal">Nome do Animal:</label>
                        <input type="text" class="form-control" id="nomeAnimal" readonly value="{{isset($medical_record['pet_name']) ? $medical_record['pet_name'] : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="descricaoServico">Descrição do Serviço:</label>
                        <textarea class="form-control" id="descricaoServico" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec metus ligula.</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input type="text" class="form-control" id="preco" readonly value="{{isset($medical_record['service_price']) ? $medical_record['service_price'] : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="profissional">Profissional Responsável:</label>
                        <input type="text" class="form-control" id="profissional" readonly value="{{isset($medical_record['professional_name']) ? $medical_record['professional_name'] : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="dataAgendamento">Data de Agendamento:</label>
                        <input type="datetime-local" class="form-control" id="dataAgendamento" value="{{isset($medical_record['date_scheduling']) ? $medical_record['date_scheduling'] : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" id="status" readonly value="Concluído">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection