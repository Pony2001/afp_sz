<?php

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>

@extends('layouts.main')

@section('content')
{{--
@foreach ($fields as $field)
{{dd($field->id)}}
@endforeach
--}}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">
            <div>
                <div>
                    <form action="{{ $employee[0]->other }}/edit" method="POST" class="form-validation">
                        @csrf

                        {{-- Név --}}
                        <div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input id="upload" type="file" name="img" hidden>
                                    <label for="upload"><img src="https://picsum.photos/id/{{ $employee[0]->id }}/200"
                                        class=" profile-picture shadow bg-white" alt="" width="100"
                                        class="shadow bg-white rounded-5">
                                    </label>
                                </div>
                                <div class="col-md-9 mt-4">
                                    <input type="text" value="{{ $employee[0]->name }}" id="name" name="name"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        {{-- Szakma --}}
                        <div><br />
                            
                        </div>
                        {{-- Új szakma --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p align="center">Valamely mezőt üresen hagyta.</p>
                                @endforeach
                            </div>
                        @endif
                            <div id="new_chq">
                                <label for="fieldinsert" class="form-validation">Szakma: </label>
                            @for ($i = 0; $i < $employeeLength; $i++)
                                
                            
                            <select name="new_{{$i+1}}" id="new_{{$i+1}}"
                                class="form-control{{ $errors->has('field') ? ' is-invalid' : '' }} mt-1">
                                <option value="{{ $employee[$i]->field_id }}">{{ $employee[$i]->field }}</option>
                                @foreach (\App\Models\Field::select('*')->get() as $fieldss)
                                    <option value="{{ $fieldss->id }}">{{ $fieldss->field }}</option>
                                @endforeach
                            </select>
                            @endfor
                            @error('field')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                            </div>
                            <input type="hidden" value="{{$employeeLength}}" id="total_chq" name="total_chq" />

                            <div>
                                <div class="float-left me-2 mt-1">
                                    <input type="button" class="btn btn-success" onclick="add()" value="+ Szakma" />
                                </div>
                                <div class="float-left mt-1">
                                    <input type="button" class="btn btn-danger" onclick="remove()" value="- Szakma" />
                                </div>
                            </div>
                            {{--
                            <div class="float-left m-1">
                                <button type="submit" class="btn btn-warning">Véglegesít</button>
                            </div>
                            --}}
                            <br>
                        
                        {{-- Város --}}
                        <div><br />
                            <label for="cityinsert" class="form-validation">Város: </label>
                            <select name="city" id="cityinsert"
                                class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
                                <option value="{{ $employee[0]->city_id }}">{{ $employee[0]->city }}</option>
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
                            <input type="text" value="{{ $employee[0]->phone }}" id="phone" name="phone"
                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" />
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- E-mail --}}
                        <div><br />
                            <label for="email" class="form-validation">E-mail: </label>
                            <input type="text" value="{{ $employee[0]->email }}" id="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Leírás --}}
                        <div><br />
                            <label for="description" class="form-validation">Leírás: </label>
                            <textarea rows="7" cols="75%" id="description" name="description"
                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $employee[0]->description }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                </div>
                <hr />
                <div>
                    <h2>Referenciák</h2>
                    <br>

                    <p align="center">
                        <img src="https://picsum.photos/id/{{ $ref[1] }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="rounded-1 shadow bg-white" name="ref" />
                        <img src="https://picsum.photos/id/{{ $ref[2] }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="rounded-1 shadow bg-white" name="ref" />
                        <img src="https://picsum.photos/id/{{ $ref[3] }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="rounded-1 shadow bg-white" name="ref" />
                        <img src="https://picsum.photos/id/{{ $ref[4] }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="rounded-1 shadow bg-white" name="ref" />
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
    {{-- Ha teljesen kész akkor külön js-be lehet rakni --}}
    <script>
        $('.add').on('click', add);
        $('.remove').on('click', remove);
  
        function add() {
              var new_chq_no = parseInt($('#total_chq').val()) + 1;
              var new_input = ""+
              "<select name = 'new_"+ new_chq_no +"'  id = 'new_" + new_chq_no +"' class='form-control mt-1'>"+
                 "<option value=''>Válasszon szakmát</option>" +
  
                 "@foreach ($fields as $field)<option value='{{ $field->id }}' >{{ $field->field }}</option>@endforeach" +
              "</select>";
  
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
     </script>
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
