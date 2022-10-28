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

                    <h3><img src="/images/unknown.png" alt="" width="100" class="shadow bg-white rounded-5">
                        {{ $employee[0]->name }}</h3>
                </div>
                <hr />
                <div>

                    <br>
                    @php
                        //<p>{{ $employee[0]->field }}</p>
                    @endphp
                    <h6>Város: </h6>
                    <p>{{ $employee[0]->city_id }}</p>
                    <h6>Telefonszám: </h6>
                    <p>{{ $employee[0]->phone }}</p>
                    <h6>E-mail: </h6>
                    <p>{{ $employee[0]->email }}</p>
                </div>


                <div>
                    <h6>Leírás: </h6>
                    <p>{{ $employee[0]->description }}</p>
                </div>
                <hr />
                <div>
                    <h2>referencia</h2>
                    <br>
                    <p>kepek</p>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
