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
                    <form action="{{route('employee.update',$employee[0]->id-1)}}" method="POST">
                        @csrf
                   
                    <h3><img src="https://www.gravatar.com/avatar/{{md5($employee[0] -> email)}}?s=32&d=identicon&r=PG" alt="" width="100" class="shadow bg-white rounded-5">
                        <input type="text" value="{{ $employee[0]->name }}" id="name" name="name"></h3>
                </div>
                <hr />
                <div>
                  
                       
                    <br>

                    <h6>Város: </h6>
                   <p> <select name="city" id="city">
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
                    <p><textarea rows="7" cols="75%" id="description" name="description" >{{ $employee[0]->description }}</textarea></p>
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
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script>
@endsection