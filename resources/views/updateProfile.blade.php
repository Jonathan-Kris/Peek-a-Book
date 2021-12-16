@extends('layouts.main')

@section('content')
    <div class="container w-50">
        <div class="card mt-5">
            <div class="card-header py-2">
              Update Profile
            </div>
            <div class="card-body">
                <form method="POST" action="/update-profile/{{ $user->id }}">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="col-5 d-flex flex-row-reverse align-items-center">
                            Username
                        </label>
                        <div class="input col-6">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="{{ $user->user_name }}" id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback error-message">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Password" class="col-5 d-flex flex-row-reverse align-items-center">Password</label>
                        <div class="input col-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                            <div class="invalid-feedback error-message">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="confirm-pass" class="col-5 d-flex flex-row-reverse align-items-center">Confirm Password</label>
                        <div class="input col-6">
                            <input type="password" class="form-control @error('confirm-pass') is-invalid @enderror" id="confirm-pass" name="confirm-pass" value="{{ old('confirm-pass') }}">
                            @error('confirm-pass')
                            <div class="invalid-feedback error-message">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">

                        </div>
                        <button type="submit" class="btn btn-md btn-primary col-3 ml-3">Submit</button>
                    </div>
                </form>
            </div>
          </div>
    </div>
@endsection
