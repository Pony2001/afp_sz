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
                    <form action="{{ $employee[0]->other }}/edit" method="POST">
                        @csrf

                        <h3><img src="https://picsum.photos/id/{{ $employee[0]->id }}/200"
                                class="profileview profile-picture shadow bg-white" alt="" width="100"
                                class="shadow bg-white rounded-5">
                            <input type="text" value="{{ $employee[0]->name }}" id="name" name="name">
                        </h3>
                </div>
                <hr />
                <div>


                    <br>
                    <h6>Szakma: </h6>
                    <p><select name="field" id="fieldinsert">
                            <option value="{{ $employee[0]->field_id }}">{{ $employee[0]->field }}</option>
                            @foreach (\App\Models\Field::select('*')->get() as $fields)
                                <option value="{{ $fields->id }}">{{ $fields->field }}</option>
                            @endforeach
                        </select>
                    </p>
                    <h6>Város: </h6>
                    <p> <select name="city" id="cityinsert">
                            <option value="{{ $employee[0]->city_id }}">{{ $employee[0]->city }}</option>
                            @foreach (\App\Models\City::select('*')->get() as $cities)
                                <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                            @endforeach
                        </select></p>
                    <h6>Telefonszám: </h6>
                    <p> <input type="text" value="{{ $employee[0]->phone }}" id="phone" name="phone"></p>
                    <h6>E-mail: </h6>
                    <p><input type="text" value="{{ $employee[0]->email }}" id="email" name="email"></p>
                </div>


                <div>
                    <h6>Leírás: </h6>
                    <p>
                        <textarea rows="7" cols="75%" id="description" name="description">{{ $employee[0]->description }}</textarea>
                    </p>
                </div>
                <hr />
                <div>
                    <h2>Referenciák</h2>
                    <br>

                    <p align="center">
                        <img src="https://picsum.photos/id/{{ $ref[1] }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="view rounded-1 shadow bg-white" name="ref" />
                        <img src="https://picsum.photos/id/{{ $ref[2] }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="view rounded-1 shadow bg-white" name="ref" />
                        <img src="https://picsum.photos/id/{{ $ref[3] }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="view rounded-1 shadow bg-white" name="ref" />
                        <img src="https://picsum.photos/id/{{ $ref[4] }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="view rounded-1 shadow bg-white" name="ref" />
                    </p>
                </div>
                <br>
                <br>
                <p align="center"><button type="submit" class="btn btn-warning">Módosít</button></p>
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
