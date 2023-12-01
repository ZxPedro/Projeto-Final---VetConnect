@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center">
    <div class="row mt-3">
        <div class="col-4">
            <h4>Relatório de Atendimentos</h4>
        </div>
        <div class="col-12 text-center mt-2 mt-md-0">
            <a class="btn btn-primary" onclick="imprimirServiceReport()"><i class="fa-solid fa-print pe-2"></i>Imprimir</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover mt-3" id="tabelaServiceReport">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Pet</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Profissional</th>
                            <th scope="col">Data de Finalização</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dashboard_schedules)
                        @foreach($dashboard_schedules as $dashboard_scheduling)
                        <tr>
                            <td>{{$dashboard_scheduling['id']}}</td>
                            <td>{{$dashboard_scheduling['customer_name']}}</td>
                            <td>{{$dashboard_scheduling['pet_name']}}</td>
                            <td>{{$dashboard_scheduling['service_name']}}</td>
                            <td>{{$dashboard_scheduling['service_price']}}</td>
                            <td>{{$dashboard_scheduling['professional_name']}}</td>
                            <td>{{$dashboard_scheduling['date_finished']}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection