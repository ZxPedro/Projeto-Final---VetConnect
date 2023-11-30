@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row justify-content-center ">
    <div class="row mt-3">
        <div class="col-4">
            <h4>Lista de Agendamentos</h4>
        </div>
        <div class="col-4 text-center">
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-describedby="button-addon2" hidden>
            </div>
        </div>
        <div class="col-4 text-end">
            <a href="{{route('agendamentos')}}" class="btn btn-primary"><i class="fa-solid fa-plus pe-2"></i>Agendar</a>
        </div>
    </div>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
    @endif
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Pet</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Profissional</th>
                            <th scope="col">Data de agendamento</th>
                            <th scope="col">Status</th>
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
                            <td>{{$dashboard_scheduling['date_scheduling']}}</td>
                            <td>{{$dashboard_scheduling['status_name']}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('agendamento-view', $dashboard_scheduling['id'])}}" class="btn btn-success me-1"><i class="fa-solid fa-eye"></i></a>
                                    @if($dashboard_scheduling['status_id'] != '4' && $dashboard_scheduling['status_id'] != '6')
                                    <form action="{{route('cancelar-agendamento', $dashboard_scheduling['id'])}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-ban"></i></button>
                                    </form>
                                    @endif
                                </div>
                            </td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col pagination justify-content-end">

            </div>
        </div>
    </div>
</div>

@endsection