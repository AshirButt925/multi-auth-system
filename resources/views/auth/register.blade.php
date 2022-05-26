@extends('layouts.app')

@section('content')

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group mb-3">
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" placeholder="Enter Your FUll Name"
                       value="{{ old('name') }}" required
                       autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" placeholder="Enter Your Email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Enter Your Password"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="password-confirm" type="password"
                       placeholder="Retype Your Password"
                       class="form-control" name="password_confirmation" required
                       autocomplete="new-password">
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <p class="mb-0">
                            <a href="/login" class="text-center">Already have account?</a>
                        </p>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
@endsection
