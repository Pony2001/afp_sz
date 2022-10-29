<?php

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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

                    <h3><img src="https://www.gravatar.com/avatar/{{md5($employee[0] -> email)}}?s=32&d=identicon&r=PG" alt="" width="100" class="shadow bg-white rounded-5">
                        <input type="text" value="{{ $employee[0]->name }}" id="name"></h3>
                </div>
                <hr />
                <div>
                    <form action="" method="POST">

                    <br>
                    @php
                        //<p>{{ $employee[0]->field }}</p>
                   
                  /* <h6>Szakma: </h6>
                    <p>{{ $employee[0]->field }}</p>*/ @endphp
                    <h6>Város: </h6>
                   <p> <input type="text" value="{{ $employee[0]->city }}" id="city"></p>
                    <h6>Telefonszám: </h6>
                   <p> <input type="text" value="{{ $employee[0]->phone }}" id="phone"></p>
                    <h6>E-mail: </h6>
                    <p><input type="text" value="{{ $employee[0]->email }}" id="email"></p>
                </div>


                <div>
                    <h6>Leírás: </h6>
                    <p><textarea rows="7" cols="75%" >{{ $employee[0]->description }}</textarea></p>
                </div>
                <hr />
                <div>
                    <h2>referencia</h2>
                    <br>
                    <p>kepek</p>
                </div>
                <button type="submit" class="btn btn-warning">Módosít</button>
            </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
