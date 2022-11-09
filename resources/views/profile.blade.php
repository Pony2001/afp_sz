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
                    <h6>Város:</h6>
                    <p><a href="{{ url('https://www.google.com/maps/place/' . $employee[0]->city) }}"
                            target="_blank">{{ $employee[0]->city }}</a>
                    </p>


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
                    <h2>Referenciák</h2>
                    <br>
                 
                    <p align="center">
                        <img class="view" width="100" src="https://picsum.photos/id/{{$ref[1]}}/200" alt="referencia" name="ref">
                        <img class="view" width="100" src="https://picsum.photos/id/{{$ref[2]}}/200" alt="referencia" name="ref">
                        <img class="view" width="100" src="https://picsum.photos/id/{{$ref[3]}}/200" alt="referencia" name="ref">
                        <img class="view" width="100" src="https://picsum.photos/id/{{$ref[4]}}/200" alt="referencia" name="ref">
                    </p>
                </div>

                <hr />
            </div>
            <div class="col-md-12 shadow bg-white rounded-5 pt-3 pb-3 listss">
                <div>

                    <form action="{{ route('comment.create') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $emp_id }}" id="id" name="id" hidden>
                        <h3>Vélemények</h3>
                        <h6>Értékelés: </h6>
                        {{--  <div class="star_rating">
                                                                        <button type="submit" class="star" name="value" value="&#9733;" >&#9734;</button>
                                                                        <button type="submit" class="star" name="value" value="&#9733;&#9733;">&#9734;</button>
                                                                        <button type="submit" class="star" name="value" value="&#9733;&#9733;&#9733;">&#9734;</button>
                                                                        <button type="submit" class="star" name="value" value="&#9733;&#9733;&#9733;&#9733;">&#9734;</button>
                                                                        <button type="submit" class="star" name="value" value="&#9733;&#9733;&#9733;&#9733;&#9733;">&#9734;</button>
                                                                    </div>
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
                                                                    --}}


                        <div class="rating">

                            <input type="radio" id="star5" name="value"
                                value="&#11088;&#11088;&#11088;&#11088;&#11088;" /><label for="star5" class="full"
                                title="Awesome"></label>
                            <input type="radio" id="star4" name="value"
                                value="&#11088;&#11088;&#11088;&#11088;" /><label for="star4" class="full"></label>
                            <input type="radio" id="star3" name="value" value="&#11088;&#11088;&#11088;" /><label
                                for="star3" class="full"></label>
                            <input type="radio" id="star2" name="value" value="&#11088;&#11088;" /><label
                                for="star2" class="full"></label>
                            <input type="radio" id="star1" name="value" value="&#11088;" /><label for="star1"
                                class="full"></label>

                        </div>
                        <br>
                        <br>
                        <div>
                            <hr>
                        </div>
                        <div>
                            <h6>Vélemény: </h6>
                            <p>
                                <textarea class="form-control" rows="4" cols="66.5%" id="comment" name="comment"></textarea>
                            </p>
                        </div>


                        <button type="submit" class="btn btn-warning">Új vélemény hozzáadása</button>
                    </form>
                </div>
            </div>

            <hr>


            @foreach ($comment as $item)
                <div class="col-md-12 shadow bg-white rounded-5 mt-3 mb-3 pt-3 pb-3 listss">
                    <p>Értékelés: {{ $item->value }}</p>
                    <p>Vélemény: {{ $item->comment }}</p>
                </div>
            @endforeach





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
