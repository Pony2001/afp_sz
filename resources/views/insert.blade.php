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
                <div>
                    
    <!-- Container (Contact Section) -->
    <div id="contact" class="container" width="30%">
       
        <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="image" />

            <button type="submit" class="btn btn-sm">Upload</button>
        </form>

    </div>  

                    <form action="{{ $employee[0]->other }}/edit" method="POST" class="form-validation">
                        @csrf

                        {{-- Név --}}
                        <div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input id="upload" type="file" name="img" hidden>
                                    <label for="upload"><img src="{{ asset('images/'.Session::get('image')) }}" 
                                        class=" profile-picture shadow bg-white" alt="" width="100"
                                        class="shadow bg-white rounded-circle">
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
                            <label for="fieldinsert" class="form-validation">Szakma: </label>
                            <select name="field" id="fieldinsert"
                                class="form-control{{ $errors->has('field') ? ' is-invalid' : '' }}">
                                <option value="{{ $employee[0]->field_id }}">{{ $employee[0]->field }}</option>
                                @foreach (\App\Models\Field::select('*')->get() as $fields)
                                    <option value="{{ $fields->id }}">{{ $fields->field }}</option>
                                @endforeach
                            </select>
                            @error('field')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

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
                            <input type="number" value="{{ $employee[0]->phone }}" id="phone" name="phone"
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
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
