@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="" class="form-validation mt-3">Név: </label>
                    <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                        name="name" value="{{ old('name') }}" required autofocus />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="" class="form-validation mt-3">Email: </label>
                    <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        type="email" name="email" value="{{ old('email') }}" required />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="" class="form-validation mt-3">Jelszó: </label>
                    <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="" class="form-validation mt-3">Jelszó megerősítése: </label>
                    <input id="password_confirmation"
                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" type="password"
                        name="password_confirmation" required />
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                    @enderror
                </div>


                <div align="center">
                    <br>
                    <button class="btn btn-warning">Bejelentkezés</button>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                </div>
            </form>

        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
