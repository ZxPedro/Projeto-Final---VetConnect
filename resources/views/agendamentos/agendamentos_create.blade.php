@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Agendamento</h2>

            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
            @endif

            <form method="post" action="{{route('agendamentos-create')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="customer_id" class="form-label mt-4">Cliente</label>
                            <select class="form-select" id="customer_id_scheduling" name="customer_id">
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="animal_id" class="form-label mt-4">Pets</label>
                            <select class="form-select" id="animal_id_scheduling" name="animal_id">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="professional_id" class="form-label mt-4">Profissional</label>
                    @if($professionals)
                    <select class="form-select" id="professional_id_scheduling" name="professional_id">
                        @foreach($professionals as $professional)
                        <option value="{{$professional->id}}">{{$professional->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <select class="form-select" id="professional_id_scheduling" name="professional_id" disabled>
                        <option value="">Não há profissionais cadastrados</option>
                    </select>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="category_id" class="form-label mt-4">Categoria</label>
                            <select class="form-select" id="category_id_scheduling" name="category_id">
                                <option value="">Selecione a categoria desejada</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="service_id" class="form-label mt-4">Serviço</label>
                            <select class="form-select" id="service_id_scheduling" name="service_id">
                                <option value="">Selecione o serviço desejado</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="data_agendamento" class="form-label mt-4">Data de Agendamento</label>
                    <input type="datetime-local" class="form-control" name="data_agendamento" id="data_agendamento" aria-describedby="data_agendamentoHelp">
                </div>
                <div class="form-group">
                    <label for="descricao" class="form-label mt-4">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label mt-4">Total do serviço</label>
                    <input type="text" class="form-control" name="total" id="total_service" placeholder="Valor do Serviço" value="" readonly>
                </div>

                <fieldset class="form-group row">
                    <legend class="mt-4">Status</legend>
                    @foreach($status as $value)
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="status_id" id="option{{ $value->status_name}}" value="{{ $value->id}}">
                        <label class="form-check-label" for="option{{ $value->status_name}}">
                            {{ $value->status_name}}
                        </label>
                    </div>
                    @endforeach
                </fieldset>

                <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

@endsection