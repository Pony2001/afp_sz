@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" class="form-validation" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" class="form-validation mt-3">Email: </label>
                    <input type="email" name="email" id="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        placeholder="example@example.org">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="form-validation mt-3">Jelszó: </label>
                    <input type="password" name="password" id="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="ms-2 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="remember_me">
                        <label for="remember_me" class="form-check-label">Emlékezz rám</label>
                    </div>
                </div>

                <div align="center">
                    <br>
                    <button class="btn btn-warning">Bejelentkezés</button>
                </div>
            </form>

        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
