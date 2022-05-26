@extends('layouts.app')

@section('content')

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group mb-3">
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}"
                       required autocomplete="email" autofocus
                       placeholder="Email">
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
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password"
                       placeholder="Password">
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
                <div class="col-8">
                    <div class="icheck-primary">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        @if (Route::has('password.request'))
            <p class="mb-1">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </p>

        @endif
        <p class="mb-0">
            <a href="/register" class="text-center">Register a new membership</a>
        </p>
    </div>
@endsection
