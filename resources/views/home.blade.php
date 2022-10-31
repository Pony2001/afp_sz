<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>
@extends('layouts.main')
@section('content')
    <div class="content">


        <div class="row">

            <div class="col-md-1">

            </div>

            <div class="col-md-6" align="center">
                <h1 class="welcome">Üdvözöllek az oldalon!</h1>
                <hr>
                <p>
                    Ez az oldal azért jött létre, hogy szakembereket tudj keresni, szűrők segítségével. Így a legjobb
                    szakembert tudod kiválasztani saját igényeidhez megfelelően.
                </p>
                <hr>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>




            </div>

            <div class="col-md-1">

            </div>

            <div class="col-md-3">
                <form action="results" method="post" class="form-validation">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />


                    <div>
                        <label for="search" class="form-validation">
                            Kereső
                        </label>
                        <input type="text" name="search" id="search" onchange="disabler()"
                            value="{{ old('search') }}" minlength="3" class="form-control" placeholder="Pl.: Fal festés">


                        @error('search')
                            @if ($message = 'The search must not be greater than 255 characters.')
                                <p class="text-red-500 text-xs mt-1" style="color: red">A keresett szöveg nem lehet több
                                    mint
                                    255 karakter.</p>
                            @else
                                <p class="text-red-500 text-xs mt-1" style="color: red">{{ $message }}</p>
                            @endif
                        @enderror
                    </div>

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



                    <div>
                        <div>
                            <label for="" class="form-validation">Szakmaválasztó</label>
                        </div>
                        <div>
                            <select name="field" id="field" class="form-control">

                                @if (!old('field'))
                                    <option value="">Válasszon szakmát</option>
                                @else
                                    <option value="{{ old('field') }}">{{ old('field') }}</option>
                                @endif

                                @foreach ($fields as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->field }}
                                    </option>
                                @endforeach


                            </select>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="" class="form-validation mt-3">Megye</label>
                        </div>
                        <div>
                            <select name="county" id="county" class="form-control">

                                @if (!old('county'))
                                    <option value="">Válasszon megyét</option>
                                @else
                                    <option value="{{ old('county') }}">{{ old('county') }}</option>
                                @endif

                                @foreach ($counties as $value)
                                    <option value="{{ $value->id }}">{{ $value->county }} ({{ $value->id }})
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="" class="form-validation mt-3">Város</label>
                        </div>
                        <div>
                            <select name="city" id="city" class="form-control">
                                <option value="">Előbb válassz megyét</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div align="center">
                        <button type="submit" class="btn btn-warning">Keresés</button>
                    </div>
                </form>
            </div>


        </div>
    </div>


    <script type="text/javascript"></script>
@endsection
