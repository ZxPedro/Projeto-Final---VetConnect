@extends('components.layout')

@section('title', 'Login - ' . env('APP_NAME'))

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card  bg-primary" style="border-radius: 1rem;">
                <div class="card-body p-5 ">

                    <div class="mb-md-5 mt-md-4 pb-5">

                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            @if($errors->any())
                            @foreach($errors->all() as $error)
                            <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <p class="mb-0">{{ $error }}</p>
                            </div>
                            @endforeach
                            @endif

                            <h2 class="fw-bold mb-2 text-white text-uppercase text-center">VetConnect</h2>
                            <p class=" mb-5 text-white text-center">Por favor insira seu login e senha!</p>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label text-white" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label text-white" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                            </div>

                            <div class="text-center">
                                <button class="btn btn-outline-light btn-lg px-5 " type="submit">Login</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection