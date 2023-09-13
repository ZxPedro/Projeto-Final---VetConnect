@extends('components.layout')

@section('title', 'Login - ' . env('APP_NAME'))


@section('content')
<div class="row justify-content-center">
    <div class="col-6 mt-5">
        <h2 class="text-center mt-2 text-default">{{ env('APP_NAME') }} </h2>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-warning">
            {{ $error }}
        </div>
        @endforeach
        @endif

        <div class="card bg-light mb-3" style="max-width: 50rem;">
            <div class="card-body">
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label mt-4 text-dark">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label mt-4 text-dark">Senha</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Senha" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection