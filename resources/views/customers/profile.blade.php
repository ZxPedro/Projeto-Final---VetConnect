@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="row">
    <div class="col">
        <ul class="nav nav-tabs mt-3" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#profile" aria-selected="true" role="tab">Cadastro</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#teste" aria-selected="false" tabindex="-1" role="tab">Pets</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#teste" aria-selected="false" tabindex="-1" role="tab">Agendamentos</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-12">
                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
                        @endforeach
                        @endif

                        @if($profile)

                        <p>Criado em: {{ $profile->created_at}}</p>
                        <p>Editado em: {{ $profile->updated_at}}</p>
                        <form method="post" action="{{route('edit-profile', ['id' => $profile->id ]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label mt-4">Nome</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome" value="{{$profile->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label mt-4">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{$profile->email}}">
                            </div>
                            <div class="form-group">
                                <label for="cpf" class="form-label mt-4">CPF</label>
                                <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfHelp" value="{{$profile->cpf}}">
                            </div>
                            <div class="form-group">
                                <label for="data_nascimento" class="form-label mt-4">Data de Nascimento</label>
                                <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" aria-describedby="data_nascimentoHelp" value="{{$profile->data_nascimento}}">
                            </div>
                            <div class="form-group">
                                <label for="telefone" class="form-label mt-4">Telefone</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="telefoneHelp" value="{{$profile->telefone}}">
                            </div>
                            <div class="form-group">
                                <label for="genero" class="form-label mt-4">Gênero</label>
                                <select class="form-select" id="genero" name="genero">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                    <option value="O">Outros</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="teste" role="tabpanel">
                <div class="row">
                    <div class="col">
                        @if(count($profile['pets']) > 0)
                        <table class="table table-hover mt-3 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Espécie</th>
                                    <th scope="col">Data de Nascimento</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($profile['pets'] as $pet)
                                <tr>
                                    <td>{{ $pet->name }}</td>
                                    <td>{{ $pet->especie }}</td>
                                    <td>{{ $pet->data_nascimento }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="mt-2">Esse cliente não possui nenhum animal cadastro!</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        @endsection