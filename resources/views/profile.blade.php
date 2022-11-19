<?php

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>

@extends('layouts.main')

@section('content')
    <script src="/js/star.js"></script>
    <script src="/js/comment.js"></script>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">




            <div class="col-md-12 shadow bg-white rounded-5">
                <hr />
                <div>

                    <h3><img class="profileview profile-picture shadow bg-white"
                            src="https://picsum.photos/id/{{ $employee[0]->id }}/200"
                            onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="100"
                            class="shadow bg-white rounded-5">
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
                    {{ $field }}
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
                    <h2 align="center">Referenciák</h2>
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

                <hr />
            </div>
            <div class="col-md-12 shadow bg-white rounded-5 pt-3 pb-3">
                <div>

                    <form action="{{ route('comment.create') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $emp_id }}" id="id" name="id" hidden>
                        <h3 align="center">Vélemények</h3>
                        @if (!Auth::check())
                            <div align="center">
                                <button id="toLogin" name="toLogin" type="submit" class="btn btn-info">
                                    A vélemény írásához jelentkezzen be!
                                </button>
                            </div>
                        @endif

                        @auth

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

                                <input class="radio" type="radio" id="star5" name="value"
                                    value="&#11088;&#11088;&#11088;&#11088;&#11088;" /><label for="star5" class="full"
                                    title="Awesome"></label>
                                <input class="radio" type="radio" id="star4" name="value"
                                    value="&#11088;&#11088;&#11088;&#11088;" /><label for="star4" class="full"></label>
                                <input class="radio" type="radio" id="star3" name="value"
                                    value="&#11088;&#11088;&#11088;" /><label for="star3" class="full"></label>
                                <input class="radio" type="radio" id="star2" name="value"
                                    value="&#11088;&#11088;" /><label for="star2" class="full"></label>
                                <input class="radio" type="radio" id="star1" name="value" value="&#11088;" /><label
                                    for="star1" class="full"></label>

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

                            <div class="mb-5">
                                <button id="add" name="add" type="submit" class="btn btn-warning float-left"
                                    title="hello">Új
                                    vélemény
                                    hozzáadása</button>
                                <p class="float-left ms-1 mt-2 text-danger" id="tooltip-text">Adjon értékelést.</p>
                                <p class="float-left ms-1 mt-2 text-danger" id="tooltip-text2">Adjon véleményt.</p>
                            </div>

                        @endauth
                    </form>
                </div>
            </div>

            <hr>


            @foreach ($comment as $item)
                <div class="col-md-12 shadow bg-white rounded-5 mt-3 mb-3 pt-3 pb-3">
                    <p>Név: {{ $item->name }}</p>
                    <p>Értékelés: {{ $item->value }}</p>
                    <p>Vélemény: {{ $item->comment }}</p>
                </div>
            @endforeach





            <div class="col-md-3"></div>
        </div>
    </div>
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
@endsection
