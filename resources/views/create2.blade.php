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
                    
                    <h1>2. lépés</h1>
                    <br>
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

                    
                    </style>
                    <div class="row">
                    <div class="col-md-10">

                     <h2>Felvett adatok: </h2>
                    <table class="table">
                     <thead>
                        <tr>
                            <th>ID</th>
                            <th>Név</th>
                            <th>E-mail</th>
                            <th>Telefon</th>
                        </tr>
                     </thead>
                     <tbody>
                         <tr>
                            <td>{{ $employee[0]->id }}</td>
                            <td>{{ $employee[0]->name }}</td>
                            <td>{{ $employee[0]->email }}</td>
                            <td>{{ $employee[0]->phone }}</td>
                        </tr>
                     </tbody>
                        
                       
                    </table>
                    </div>
                    

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    
                     
                        <div class="col-md-12">
                           
                        </div>
                    
                        <h2>Szakma: </h2>
                        <div id="new_chq" class="col-md-12">
                           <select name="" id="" class='form-control m-1'>
                              <option value="">Válasszon szakmát</option>
                              @foreach ($fields as $field)
                                 <option id='{{ $field->id }}'>
                                    {{ $field->field }}
                                 </option>
                              @endforeach
                           </select>
                        </div>
                        <input type="hidden" value="1" id="total_chq" />

                        <div class="col-md-12">
                           <div class="float-left m-1">
                              <button class="btn btn-success" onclick="add()">+ Szakma</button>
                           </div>
                           <div class="float-left m-1">
                              <button class="btn btn-danger" onclick="remove()">- Szakma</button>
                           </div>
                        </div>
                        
                     </div>

                </div>
                <script>
                    $('.add').on('click', add);
                    $('.remove').on('click', remove);

                    function add() {
                        var new_chq_no = parseInt($('#total_chq').val()) + 1;
                        var new_input = " <select id = 'new_" + new_chq_no + "' class='form-control m-1'><option value=''>Válasszon szakmát</option>@foreach ($fields as $field)<option id='{{ $field->id }}' >{{ $field->field }}</option>@endforeach</select>";

                        $('#new_chq').append(new_input);

                        $('#total_chq').val(new_chq_no);
                    }

                    function remove() {
                        var last_chq_no = $('#total_chq').val();

                        if (last_chq_no > 1) {
                            $('#new_' + last_chq_no).remove();
                            $('#total_chq').val(last_chq_no - 1);
                        }
                    }
                </script></select>

                
            @endsection
