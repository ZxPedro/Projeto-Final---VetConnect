@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')
<div class="container mt-4">
    <div class="row">
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif

        @if($dashboard_schedules)
        @foreach($dashboard_schedules as $dashboard_scheduling)
        @if($dashboard_scheduling && $dashboard_scheduling['status_id'] == '2')
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    Informações de Atendimento
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Atendimento: </strong> #{{$dashboard_scheduling['id']}}</li>
                        <li class="list-group-item"><strong>Horário: </strong>{{$dashboard_scheduling['date_scheduling']}}</li>
                        <li class="list-group-item"><strong>Cliente: </strong>{{$dashboard_scheduling['customer_name']}}</li>
                        <li class="list-group-item"><strong>Pet: </strong>{{$dashboard_scheduling['pet_name']}}</li>
                        <li class="list-group-item"><strong>Serviço: </strong>{{$dashboard_scheduling['service_name']}}</li>
                        <li class="list-group-item"><strong>Profissional: </strong>{{$dashboard_scheduling['professional_name']}}</li>
                        <li class="list-group-item"><strong>Valor: </strong>{{$dashboard_scheduling['service_price']}}</li>
                        <li class="list-group-item"><strong>Status: </strong>{{$dashboard_scheduling['status_name']}}</li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <form action="{{route('finalizar-agendamento', $dashboard_scheduling['id'])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Finalizar</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @endif
    </div>
</div>

@endsection