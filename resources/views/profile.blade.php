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
                <a href="{{ url()->previous() }}" class="btn btn-warning">&laquo; Vissza</a>
            </div>

            <div class="col-md-12 shadow bg-white rounded-5 listss">
                <hr />
                <div>

                    <h3><img src="https://www.gravatar.com/avatar/{{ md5($employee[0]->email) }}?s=32&d=identicon&r=PG"
                            alt="" width="100" class="shadow bg-white rounded-5">
                        {{ $employee[0]->name }}</h3>
                </div>
                <hr />
                <div>

                    <br>
                    <h6>Város: 
                    <a
                            href="{{ url('https://www.google.com/maps/place/' . $employee[0]->city) }}">{{ $employee[0]->city }}</a>
                    </h6>
                    
                    <h6>Szakma: </h6>
                    @foreach ($employee as $employees)
                        {{ $employees->field }},
                    @endforeach
                    <p></p>
                    <h6>Telefonszám: </h6>
                    <p><a href="tel:{{ $employee[0]->phone }}">{{ $employee[0]->phone }}</a></p>
                    <h6>E-mail: </h6>
                    <p><a href="mailto:{{ $employee[0]->email }}">{{ $employee[0]->email }}</a></p>
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
                
                <hr />
            </div>
            <div class="col-md-12 shadow bg-white rounded-5 listss">
                <div>
                    <form action="{{ route('comment.create') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $emp_id }}" id="id" name="id" hidden>
                        <h3>Vélemények</h3>
                        <h6>Értékelés: </h6>
                        <input type="radio" id="value1" name="value" value="&#11088;" hidden>
                        <label for="value1">&#11088;</label>
                        <input type="radio" id="value2" name="value" value="&#11088;&#11088;" hidden>
                        <label for="value2">&#11088;</label>
                        <input type="radio" id="value3" name="value" value="&#11088;&#11088;&#11088;" hidden>
                        <label for="value3">&#11088</label>
                        <input type="radio" id="value4" name="value" value="&#11088;&#11088;&#11088;&#11088;" hidden>
                        <label for="value4">&#11088;</label>
                        <input type="radio" id="value5" name="value" value="&#11088;&#11088;&#11088;&#11088;&#11088;"
                            hidden>
                        <label for="value5">&#11088;</label>
                        <div>
                            <h6>Vélemény: </h6>
                            <p>
                                <textarea class="form-control" rows="4" cols="66.5%" id="comment" name="comment"></textarea>
                            </p>
                        </div>
                        <button type="submit" class="btn btn-warning">Új vélemény hozzáadása</button>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($comment as $item)
                            <p>Értékelés: {{ $item->value }}</p>
                            <p>Vélemény: {{ $item->comment }}</p>
                            <hr />
                        @endforeach

                    </div>
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
