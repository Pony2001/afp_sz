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
                </div>
                <div>
                    <form action="{{ route('employee.create') }}" method="POST">
                        @csrf
                        <h6>Név: </h6>
                        <h6> <input type="text" id="name" name="name"></h6>
                </div>

                <div>

                    <br>
                    <h6>Szakma: </h6>
                    <p><select name="field" id="fieldcreate">
                            @foreach (\App\Models\Field::select('*')->get() as $fields)
                                <option value="{{ $fields->id }}">{{ $fields->field }}</option>
                            @endforeach
                        </select>
                    </p>
                    <h6>Város: </h6>
                    <p><select name="city" id="city2">
                            @foreach (\App\Models\City::select('*')->get() as $cities)
                                <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                            @endforeach
                        </select>
                    </p>
                    <h6>Telefonszám: </h6>
                    <p> <input type="text" id="phone" name="phone"></p>
                    <h6>E-mail: </h6>
                    <p><input type="text" id="email" name="email"></p>
                </div>


                <div>
                    <h6>Leírás: </h6>
                    <p>
                        <textarea rows="7" cols="75%" id="description" name="description"></textarea>
                    </p>
                </div>
                <hr />
                <button type="submit" class="btn btn-warning">Létrehozás</button>
                </form>
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
