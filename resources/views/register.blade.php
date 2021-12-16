@extends("layouts.main")

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush

@section("content")
<div class="content-container">
    <div class="main-div container col-3 text-center">
        <main class="form-register">

            <h2 class="mt-5">Register</h2>
            <form method="POST" action="/api/register">
                @csrf
                <div class="form-floating">
                    <input type="text" id="floatingInput" class="form-control @error('name') is-invalid @enderror"
                        name="name" placeholder="Kimi No Namaewa" required value="{{ old('name') }}">
                    <label for="floatingInput">Name</label>

                    @error('name')
                    <div class="invalid-feedback error-message">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror"
                        name="email" placeholder="Your age" required value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>

                    @error('email')
                    <div class="invalid-feedback error-message">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" id="floatingPassword"  class="form-control @error('password') is-invalid @enderror"
                        class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password"
                        required value="{{ old('password') }}">
                    <label for="floatingPassword">Password</label>

                    @error('password')
                    <div class="invalid-feedback error-message">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" id="floatingPassword" class="form-control @error('password_confirmation') is-invalid @enderror"
                        class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                        placeholder="Confirm Password" required value="{{ old('password') }}">
                    <label for="floatingPassword">Confirm Password</label>

                    @error('confirm_password')
                    <div class="invalid-feedback error-message">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="w-100 btn btn-lg btn-success register-button mt-2">Register</button>
            </form>

            <button onclick="location.href = 'home';" class="w-100 btn btn-lg btn-secondary mt-2">Go Back</button>

            <small class="d-block text-center mt-3"> Already have account? <a href="login"> Login Now!</a></small>

        </main>
    </div>
</div>
@endsection
