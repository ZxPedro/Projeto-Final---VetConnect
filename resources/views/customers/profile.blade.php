@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs mt-3" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#profile" aria-selected="true" role="tab">Cadastro</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#enderecos" aria-selected="false" tabindex="-1" role="tab">Endereços</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#pets" aria-selected="false" tabindex="-1" role="tab">Pets</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#teste" aria-selected="false" tabindex="-1" role="tab">Agendamentos</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">
                            @if($errors->any())
                            @foreach($errors->all() as $error)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endforeach
                            @endif

                            @if($profile)
                            <p>Criado em: {{ $profile->created_at}} | Editado em: {{ $profile->updated_at}}</p>
                            <form method="post" action="{{route('edit-profile', ['id' => $profile->id ]) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label mt-4">Nome</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome" value="{{$profile->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label mt-4">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{$profile->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="cpf" class="form-label mt-4">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfHelp" value="{{$profile->cpf}}">
                                </div>
                                <div class="mb-3">
                                    <label for="data_nascimento" class="form-label mt-4">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" aria-describedby="data_nascimentoHelp" value="{{$profile->data_nascimento}}">
                                </div>
                                <div class="mb-3">
                                    <label for="telefone" class="form-label mt-4">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="telefoneHelp" value="{{$profile->telefone}}">
                                </div>
                                <div class="mb-3">
                                    <label for="genero" class="form-label mt-4">Gênero</label>
                                    <select class="form-select" id="genero" name="genero">
                                        <option value="M" {{$profile->genero === 'M' ? 'selected' : '' }}>Masculino</option>
                                        <option value="F" {{$profile->genero === 'F' ? 'selected' : '' }}>Feminino</option>
                                        <option value="O" {{$profile->genero === 'O' ? 'selected' : '' }}>Outros</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="enderecos" role="tabpanel">
                    <div class="row">
                        <div class="col">
                            <div class="mt-2 text-end">
                                <a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#ModalEndereco"><i class="fa-solid fa-plus pe-2"></i>Novo Endereço</a>
                            </div>

                            @if(count($profile->address) > 0)
                            <table class="table table-hover mt-3 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Endereço</th>
                                        <th scope="col">Número</th>
                                        <th scope="col">Complemento</th>
                                        <th scope="col">CEP</th>
                                        <th scope="col">Bairro</th>
                                        <th scope="col">Cidade</th>
                                        <th scope="col">UF</th>
                                        <th scope="col">Principal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($profile['address'] as $address)
                                    <tr>
                                        <td>{{$address['endereco']}}</td>
                                        <td>{{$address['endereco_numero']}}</td>
                                        <td>{{$address['endereco_complemento']}}</td>
                                        <td>{{$address['endereco_cep']}}</td>
                                        <td>{{$address['endereco_bairro']}}</td>
                                        <td>{{$address['cidade']}}</td>
                                        <td>{{$address['uf']}}</td>
                                        <td>
                                            @if($address['flagprincipal'])
                                            <i class="fa-solid fa-check"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success edit-address" data-variable="{{$address->id}}" data-bs-toggle="modal" data-bs-target="#ModalEndereco"><i class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route('delete-address', ['id'=> $address->id]) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p class="mt-2">Esse cliente não possui nenhum endereço cadastrado!</p>
                            @endif
                        </div>
                    </div>

                    <div class="modal fade" id="ModalEndereco" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cadastro de Endereço</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="{{ route('create-address') }}">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="hidden" id="customer_id" name="customer_id" value="{{$profile->id}}" />
                                        <input type="hidden" id="address_id" name="address_id" value="" />
                                        <div class="mb-3">
                                            <label for="cep" class="form-label mt-4">CEP</label>
                                            <input type="text" class="form-control" name="endereco_cep" id="endereco_cep" onblur="pesquisacep(this.value);">
                                        </div>
                                        <div class="mb-3">
                                            <label for="endereco" class="form-label mt-4">Endereço</label>
                                            <input type="text" class="form-control" name="endereco" id="endereco" value="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="numero" class="form-label mt-4">Número</label>
                                            <input type="text" class="form-control" name="endereco_numero" id="endereco_numero">
                                        </div>
                                        <div class="mb-3">
                                            <label for="complemento" class="form-label mt-4">Complemento</label>
                                            <input type="text" class="form-control" name="endereco_complemento" id="endereco_complemento">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bairro" class="form-label mt-4">Bairro</label>
                                            <input type="text" class="form-control" name="endereco_bairro" id="endereco_bairro">
                                        </div>
                                        <div class="mb-3">
                                            <label for="cidade" class="form-label mt-4">Cidade</label>
                                            <input type="text" class="form-control" name="cidade" id="cidade">
                                        </div>
                                        <div class="mb-3">
                                            <label for="uf" class="form-label mt-4">UF</label>
                                            <input type="text" class="form-control" name="uf" id="uf">
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="1" id="flagprincipal" name="flagprincipal">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Endereço Principal
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pets" role="tabpanel">
                    <div class="row">
                        <div class="col">
                            <div class="mt-2 text-end">
                                <a href="{{ route('view-pet-create', ['id' => $profile->id ]) }}" class="btn btn-primary"><i class="fa-solid fa-plus pe-2"></i>Novo Pet</a>
                            </div>

                            @if(count($profile['pets']) > 0)
                            <table class="table table-hover mt-3 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Espécie</th>
                                        <th scope="col">Data de Nascimento</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($profile['pets'] as $pet)
                                    <tr>
                                        <td>{{ $pet->name }}</td>
                                        <td>{{ $pet->especie }}</td>
                                        <td>{{ $pet->data_nascimento }}</td>
                                        <td>
                                            <a href="{{ route('edit-pet', ['id' => $pet->id ]) }}" class=" btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route('delete-pet', $pet->id) }}" class=" btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p class="mt-2">Esse cliente não possui nenhum animal cadastrado!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection