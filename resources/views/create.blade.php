<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
?>

@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">


            <div>
                <a href="{{ url()->previous() }}" class="btn btn-warning">Vissza</a>
            </div>

            <div>
                <hr />
                <div>
                    <h2>Új szaki hozzáadása</h2>
                    <h1>1. lépés</h1>
                </div>
                <div>
                    {{--
                        Create:

                        Ha a validate sikeres töltse fel az adatokat az adatbázisba,
                        majd irányítsa át a szakma választó oldalra.

                        Kérdezzük meg a felhasználótól hány szakmája van,
                        majd ez alapján generáljunk annyi legürdülő menüt.
                        (?maximum 3 szakmája lehet?)

                        Végül töltse fel a kiválasztott szakmákat az adatbázisba,
                        majd irányítsa át a főmenübe.
                     --}}
                    <form action="{{ route('employee.create') }}" method="POST" class="form-validation">
                        @csrf

                        {{-- Név --}}
                        <div><br />
                            <label for="name" class="form-validation">Név: </label>
                            <input type="text" id="name" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Város --}}
                        <div><br />
                            <label for="city2" class="form-validation">Város: </label>
                            <select name="city" id="city2"
                                class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" />
                            <option value="">Válasszon várost</option>
                            @foreach (\App\Models\City::select('*')->get() as $cities)
                                <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                            @endforeach
                            </select>
                            @error('city')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Telefon --}}
                        <div><br />
                            <label for="phone" class="form-validation">Telefonszám: </label>
                            <input type="text" id="phone" name="phone"
                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" />
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- E-mail --}}
                        <div><br />
                            <label for="email" class="form-validation">E-mail: </label>
                            <input type="text" id="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Leírás --}}
                        <div><br />
                            <label for="description" class="form-validation">Leírás: </label>
                            <textarea rows="7" cols="75%" id="description" name="description"
                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">
                            </textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>


                        <br />
                        <button type="submit" class="btn btn-warning">Tovább</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
