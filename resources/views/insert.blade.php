<?php

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>

@extends('layouts.main')

@section('content')
    {{--
<script src="/js/uploadimg.js"></script>
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

                    {{--
                    <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
                        @csrf
                        <p>Profilkép</p>
                        <div>
                            <input type="file" class="form-control" name="image" id="updloadProfilePic" />
                            <br>
                        </div>
                        <p>Referenciák</p>
                        <div>
                            <input type="file" class="form-control" name="image2" id="updloadPic1" />
                            <input type="file" class="form-control" name="image3" id="updloadPic2" />
                            <input type="file" class="form-control" name="image4" id="updloadPic3" />
                            <input type="file" class="form-control" name="image5" id="updloadPic4" />
                            <br>
                            <button type="submit" class="btn btn-secondary" align="center" id="myFuncBtn">Képek
                                feltöltése</button>
                        </div>
                    </form>
                    --}}
                    <form action="{{ $employee[0]->other }}/edit" method="POST" class="form-validation">
                        @csrf


                        <div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input id="upload" type="file" name="img" hidden>
                                    <label for="upload"><img src="https://picsum.photos/id/{{ $employee[0]->id }}/200"
                                            class=" profile-picture shadow bg-white" alt="" width="100"
                                            class="shadow bg-white rounded-5">
                                    </label>
                                    <img src="{{ asset('profil_img/' . Session::get('image')) }}"
                                        class=" profile-picture shadow bg-white" alt="" width="100"
                                        class="shadow bg-white rounded-circle">

                                </div>
                                <div class="col-md-9 mt-4">
                                    <input type="text" value="{{ $employee[0]->name }}" id="name" name="name"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mt-2" />
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Szakma --}}
                        <div><br />
                            <div id="new_chq">

                                <label for="fieldinsert" class="form-validation">Szakma: </label>
                                @error('fields')
                                    <div class="alert alert-danger">
                                        <span class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</span>
                                    </div>
                                @enderror


                                @for ($i = 0; $i < $employeeLength; $i++)
                                    <select name="fields[]" id="new_{{ $i + 1 }}"
                                        class="form-control{{ $errors->has('fields.' . $i) ? ' is-invalid' : '' }} mt-1">

                                        <option value="{{ $employee[$i]->field_id }}">{{ $employee[$i]->field }}</option>

                                        @foreach (\App\Models\Field::select('*')->get() as $fieldss)
                                            <option value="{{ $fieldss->id }}">{{ $fieldss->field }}</option>
                                        @endforeach

                                    </select>
                                @endfor

                                @if (old('total_chq'))
                                    @for ($j = $employeeLength; $j < intval(old('total_chq')); $j++)
                                        <select name="fields[]" id="new_{{ $j + 1 }}"
                                            class="form-control{{ $errors->has('fields.' . $j) ? ' is-invalid' : '' }} mt-1">
                                            <option
                                                value="
                                                {{ 0 >= intval(old('fields.' . $j)) ? '' : intval(old('fields.' . $j)) }}">
                                                {{ 0 < intval(old('fields.' . $j)) ? $fields[intval(old('fields.' . $j)) - 1]->field : 'Válasszon szakmát' }}
                                            </option>

                                            @foreach (\App\Models\Field::select('*')->get() as $fieldss)
                                                <option value="{{ $fieldss->id }}">{{ $fieldss->field }}</option>
                                            @endforeach

                                        </select>
                                    @endfor
                                @endif

                            </div>
                            @if (old('total_chq'))
                                <input type="hidden" value="{{ old('total_chq') }}" id="total_chq" name="total_chq" />
                            @else
                                <input type="hidden" value="{{ $employeeLength }}" id="total_chq" name="total_chq" />
                            @endif

                            <div>
                                <div class="float-left me-2 mt-1">
                                    <input type="button" class="btn btn-success" onclick="add()" value="+ Szakma" />
                                </div>
                                <div class="float-left mt-1">
                                    <input type="button" class="btn btn-danger" onclick="remove()" value="- Szakma" />
                                </div>
                            </div>
                        </div><br />

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
                <p align="center"><button type="submit" class="btn btn-warning" id="uploadBtn">Módosít</button></p>
                </form>
                <div>
                    <h2>Referenciák</h2>
                    <br>
                    <p align="center">

                        <img src="{{ asset('ref_img/' . Session::get('image2')) }}"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="rounded-1 shadow bg-white" name="ref" />
                        <img src="{{ asset('ref_img2/' . Session::get('image3')) }}"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="rounded-1 shadow bg-white" name="ref2" />
                        <img src="{{ asset('ref_img3/' . Session::get('image4')) }}"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="rounded-1 shadow bg-white" name="ref3" />
                        <img src="{{ asset('ref_img4/' . Session::get('image5')) }}"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="rounded-1 shadow bg-white" name="ref4" />
                    </p>
                </div>
                <br>
                <br>


            </div>
        </div>
        <div class="col-md-3"></div>

    </div>
    {{-- Ha teljesen kész akkor külön js-be lehet rakni --}}
    <script>
        $('.add').on('click', add);
        $('.remove').on('click', remove);

        function add() {

            const selects = document.getElementsByTagName('select').length;
            var new_chq_no = selects;
            const fieldOptions = {!! $fields->toJson() !!}
            console.log(fieldOptions)
            let optionHtml = fieldOptions.reduce((html, field) => html +
                `<option value="${field.id}" >${field.field}</option>`);
            const newInput = `<select name="fields[]" id="new_${new_chq_no}" class='form-control mt-1'>
                                 <option value=''>Válasszon szakmát</option>
                                 <option value='1'>Titkár(nő)</option>
                                 ${optionHtml}
                                 </select>`

            $('#new_chq').append(newInput);

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
@endsection
