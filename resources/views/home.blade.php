<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>
@extends('layouts.main')
@section('content')
    <script src="/js/inputState.js"></script>
    <div class="content">


        <div class="row">

            <div class="col-md-1">

            </div>

            <div class="col-md-6" align="center">
                @auth
                    <h1 class="welcome">Üdv {{ Auth::user()->name }}!</h1>
                @else
                    <h1 class="welcome">Üdvözöllek az oldalon!</h1>
                @endauth
                <hr>
                <p>
                    Ez az oldal azért jött létre, hogy szakembereket tudj keresni, szűrők segítségével. Így a
                    <strong>legjobb
                        szakember</strong>t tudod kiválasztani saját <strong>igényeidhez megfelelően</strong>.
                </p>
                <hr>
                <p>
                    A kereső mezőbe írva szűrhet a szakemberek nevére, e-mail címére, telefonszámára illetve leírására,
                    vagy
                    használhatja <strong>előre beállított szűrő</strong>inket amely <strong>gyorsabb keresés</strong>t
                    biztosít.
                    Mint például a szakmaválasztó,<strong> ahol csak olyan szakmák</strong> jelennek meg, amelyhez társul
                    szakember az adatbázisunkban.
                    Mind emellett Magyarország megyéi alapján is szűrhet, pontosabb szűréshez lehetősege van használni a
                    <strong>megyék</strong>hez
                    hozzá rendelt <strong>városok</strong>at/<strong>falvak</strong>at, természetesen ebben az esetben is
                    csak olyan megyék és városok <strong>jelennek meg</strong>
                    Önnek, <strong>amelyhez társul szakember</strong> az adatbázisunkban.
                </p>
                <p>
                    Köszönjük, hogy elolvasta! További jó keresést!
                </p>




            </div>

            <div class="col-md-1">

            </div>


            {{-- Szűrők --}}
            <div class="col-md-3">
                <form action="results" method="GET" class="form-validation">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />

                    {{-- Kereső --}}
                    <div>
                        <label for="search" class="form-validation">Kereső</label>
                        <input type="text" name="search" id="search" value="{{ old('search') }}"
                            class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}"
                            placeholder="Szakembert keres?">


                        @error('search')
                            <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>


                    {{-- Elválasztó --}}
                    <div class="vagy">
                        <div class="row">
                            <div class="col-md-4">
                                <hr>
                            </div>
                            <div class="col-md-4">
                                <p align="center">Vagy</p>
                            </div>
                            <div class="col-md-4">
                                <hr>
                            </div>
                        </div>
                    </div>


                    {{-- Szakmaválasztó --}}
                    <div>
                        <label for="" class="form-validation">Szakmaválasztó</label>
                        <select name="field" id="field"
                            class="form-control{{ $errors->has('field') ? ' is-invalid' : '' }}">

                            @if (!old('field'))
                                <option value="">Válasszon szakmát</option>
                            @else
                                <option value="{{ old('field') }}">{{ $oldFields[old('field') - 1]->field }}</option>
                            @endif

                            @foreach ($fields as $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->field }}
                                </option>
                            @endforeach


                        </select>
                        @error('field')
                            <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Megyeválasztó --}}
                    <div>
                        <label for="" class="form-validation mt-3">Megye</label>
                        <select name="county" id="county"
                            class="form-control{{ $errors->has('county') ? ' is-invalid' : '' }}">

                            @if (!old('county'))
                                <option value="">Válasszon megyét</option>
                            @else
                                <option value="{{ old('county') }}">{{ old('county') }}</option>
                            @endif

                            @foreach ($counties as $value)
                                <option value="{{ $value->county }}">{{ $value->county }}</option>
                            @endforeach

                        </select>
                        @error('county')
                            <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Városválasztó --}}
                    <div>
                        <label for="" class="form-validation mt-3">Város</label>
                        <select name="city" id="city"
                            class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
                            <option value="">Előbb válassz megyét</option>
                        </select>
                        @error('city')
                            <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <br>
                    <div align="center">
                        <button type="submit" name="submit" id="submit" class="btn btn-warning">Keresés</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
