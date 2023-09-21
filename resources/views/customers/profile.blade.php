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
                        <form method="post" action="">
                            @csrf
                            <div class="form-group col-6">
                                <label for="name" class="form-label mt-4">Nome</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome">
                            </div>
                            <div class="form-group col-6">
                                <label for="email" class="form-label mt-4">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label mt-4">CPF</label>
                                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label mt-4">Data de Nascimento</label>
                                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label mt-4">Telefone</label>
                                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                            </div>
                            <div class="form-group">
                                <label for="genero" class="form-label mt-4">Gênero</label>
                                <select class="form-select" id="genero">
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                    <option>Outros</option>
                                </select>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="teste" role="tabpanel">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
            </div>
        </div>


    </div>
</div>

@endsection