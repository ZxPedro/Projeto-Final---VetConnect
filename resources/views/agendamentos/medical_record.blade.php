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
                <div class="col-md-6 mb-3">
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
                        <label for="profissional">Profissional Responsável:</label>
                        <input type="text" class="form-control" id="profissional" readonly value="{{isset($medical_record['professional_name']) ? $medical_record['professional_name'] : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="profissional">Serviço:</label>
                        <input type="text" class="form-control" id="profissional" readonly value="{{isset($medical_record['service_name']) ? $medical_record['service_name'] : ''}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input type="text" class="form-control" id="preco" readonly value="{{isset($medical_record['service_price']) ? $medical_record['service_price'] : ''}}">
                    </div>
                    <form action="{{route('agendamento-update', $medical_record['id'])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="descricaoServico">Descrição do Serviço:</label>
                            <textarea class="form-control" name="descricao" id="descricaoServico">{{isset($medical_record['description']) ? $medical_record['description'] : ''}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="dataAgendamento">Data de Agendamento:</label>
                            <input type="datetime-local" name="data_agendamento" class="form-control" id="data_agendamento" value="{{isset($medical_record['date_scheduling']) ? $medical_record['date_scheduling'] : ''}}">
                        </div>
                        <div class="form-group">
                            <label for="status_id" class="form-label mt-4">Status</label>
                            <select class="form-select" id="status_id" name="status_id">

                                @foreach($status as $value)
                                <option value="{{ $value->id }}" {{ isset($medical_record['status_id']) ? $medical_record['status_id'] == $value->id ? 'selected' : '' : ''}}> {{ $value->status_name }} </option>
                                @endforeach

                            </select>
                        </div>
                        @if($medical_record['status_id']!= '4')
                        <button type="submit" class="btn btn-primary mt-2 text-end">Atualizar</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection