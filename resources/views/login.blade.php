@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush

@section('content')
@if (Session::get('auth_session'))
   {{ info(Session::get('auth_session')['email']) }}
@endif

<div class="content-container">
    <div class="container col-3 text-center">
        <main class="form-signin center-form">

            <h2 class="mt-5 mb-3 fw-normal">Login</h2>
            <form method="POST" action="/api/login">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="name@example.com" autofocus required value="{{ Cookie::get('EMAIL_COOKIE') !== null ? Cookie::get('EMAIL_COOKIE') : "" }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password" value="{{ Cookie::get('PASSWORD_COOKIE') !== null ? Cookie::get('PASSWORD_COOKIE') : "" }}">
                    <label for="floatingPassword">Password</label>
                    @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Checkbox -->
                    <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="remember_me"
                        id="remember_me" name="remember_me" checked={{ Cookie::get('EMAIL_COOKIE') !== null }} />
                        <label class="form-check-label" for="form2Example3">
                            Remember me
                        </label>
                    </div>
                </div>

                <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
            </form>

            <button class="w-100 mt-1 btn btn-lg btn-secondary" onclick="location.href = 'home';">Go Back</button>
            <small class="d-block text-center mt-3"> Not Registered? <a href="register"> Register Now!</a></small>
        </main>
    </div>
</div>
@endsection
