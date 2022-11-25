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
                    <form action="{{ route('employee.create') }}" method="POST" class="form-validation">
                        @csrf

                        {{-- Név --}}
                        <div><br />
                            <label for="name" class="form-validation">Név: </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Szakma --}}
                        <div><br />
                            <label for="fieldinsert" class="form-validation">Szakma: </label>
                            @error('fields')
                                <div class="alert alert-danger">
                                    <span class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</span>
                                </div>
                            @enderror
                            <div id="new_chq">


                                @if (old('total_chq'))
                                    @for ($j = 0; $j < intval(old('total_chq')); $j++)
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
                                @else
                                    <select name="fields[]" id="new_1" class="form-control mt-1">

                                        <option value="">Válasszon szakmát</option>

                                        @foreach (\App\Models\Field::select('*')->get() as $fieldss)
                                            <option value="{{ $fieldss->id }}">{{ $fieldss->field }}</option>
                                        @endforeach

                                    </select>
                                @endif
                            </div>
                            @if (old('total_chq'))
                                <input type="hidden" value="{{ old('total_chq') }}" id="total_chq" name="total_chq" />
                            @else
                                <input type="hidden" value="1" id="total_chq" name="total_chq" />
                            @endif

                            <div>
                                <div class="float-left me-2 mt-1">
                                    <input type="button" class="btn btn-success" onclick="add()" value="+ Szakma" />
                                </div>
                                <div class="float-left mt-1">
                                    <input type="button" class="btn btn-danger" onclick="remove()" value="- Szakma" />
                                </div>
                            </div>
                        </div><br /><br />

                        {{-- Város --}}
                        <div><br />
                            <label for="city2" class="form-validation">Város: </label>
                            <select name="city" id="city2" value="{{ old('city') }}"
                                class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" />
                            <option value="">Válasszon várost</option>
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
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" />
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- E-mail --}}
                        <div><br />
                            <label for="email" class="form-validation">E-mail: </label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Leírás --}}
                        <div><br />
                            <label for="description" class="form-validation">Leírás: </label>
                            <textarea rows="7" cols="75%" id="description" name="description"
                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @enderror
                        </div>


                        <br />
                        <button type="submit" class="btn btn-warning">Tovább</button>
                    </form>
                </div>
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
