@extends('components.layout')

@section('navbar', View::make('components.navbar'))

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <h2 class="text-center mt-5">Cadastro de Profissionais</h2>

            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
            @endif

            <form method="post" action="{{ isset($professional) ? route('professional-update', $professional->id) : route('professionals-create') }}">
                @csrf
                <div class="form-group">
                    <label for="user_id" class="form-label mt-4">Profissional</label>
                    <select class="form-select" id="user_id" name="user_id">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ isset($professional->id) ? $professional->id === $user->id ? 'selected' : '' : ''}}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="working_days" class="form-label mt-4">Dias de trabalho</label>
                    <select multiple="multiple" class="form-select" id="working_days" name="working_days[]">
                        @foreach($days as $day)
                        @php
                        // Verifica se o dia está presente nos dias de trabalho do profissional
                        isset($professional) ? $isSelected = in_array($day['name'], $professional['working_days']) : '';

                        @endphp
                        <option value="{{$day['name']}}" {{ isset($isSelected) ? $isSelected ? 'selected' : '' : '' }}>{{$day['value']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="category_id" class="form-label mt-4">Especialidades</label>
                    <select multiple="multiple" class="form-select" id="category_id" name="category_id[]">
                        @foreach($categories as $category)
                        @php
                        // Verifica se a categoria está presente nas especialidades do profissional
                        isset($professional) ? $isSelected_specialties = in_array($category->id, $professional['specialties']) : '';

                        @endphp
                        <option value="{{ $category->id }}" {{ isset($isSelected_specialties) ? $isSelected_specialties ? 'selected' : '' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">{{ isset($professional) ? 'Atualizar' : 'Cadastrar'}}</button>
            </form>
        </div>
    </div>
</div>

@endsection