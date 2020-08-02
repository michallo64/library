@extends('layouts.app')

@section('content')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Knižnica</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Prihláste sa pre pokračovanie</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" name="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" placeholder="Email" required
                               autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" placeholder="Heslo"
                               name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-5">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block">Registrácia</a>
                        </div>
                        <div class="col-4 offset-3">
                            <button type="submit" class="btn btn-success btn-block">Prihlásiť</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-0">
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

@endsection
