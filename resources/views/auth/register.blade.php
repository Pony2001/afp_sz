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
                    <input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                        autofocus />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="" class="form-validation mt-3">Email: </label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                        required />
                </div>

                <!-- Password -->
                <div>
                    <label for="" class="form-validation mt-3">Jelszó: </label>
                    <input id="password" class="form-control" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="" class="form-validation mt-3">Jelszó megerősítése: </label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                        required />
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
