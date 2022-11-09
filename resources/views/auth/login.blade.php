@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" class="form-validation" action="#">
                @csrf
                <div>
                    <label for="email" class="form-validation mt-3">Email:</label>
                    <input type="text" name="email" id="email" minlength="3" class="form-control"
                        placeholder="example@example.org">
                </div>
                <div>
                    <label for="password" class="form-validation mt-3">Jelszó:</label>
                    <input type="password" name="password" id="password" minlength="3" class="form-control"
                        placeholder="password">
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
