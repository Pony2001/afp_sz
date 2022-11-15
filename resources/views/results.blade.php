<?php
use App\Providers;
use App\Models\Field_Employee;
use App\Models\Field;
use App\Models\City;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>

@extends('layouts.main')

@section('content')
    <br><br>


    <div class="row">
        @if ($results->isEmpty() == true)
            <div class="col-md-2">
            </div>
            <div class="col-md-8 alert alert-danger">
                <h1 align="center">Nincs találat.</h1>
                <h5 align="center"><a href="{{ url()->previous() }}" class="btn btn-danger">Vissza a szűrükhöz</a></h5>
            </div>
        @else
            @foreach ($results as $employee)
                <div class="col-md-2">
                </div>
                <div class="col-md-8 shadow bg-orange rounded-5 listss">
                    <form action="/profile/{{ $employee->id }}" class="profile">
                        <div class="row">
                            <div class="col-md-10">
                                <table>
                                    <tr>
                                        <td rowspan="4">
                                            <img src="https://picsum.photos/id/{{ $employee->id }}/200"
                                                onerror="this.onerror=null; this.src='/images/unknown.png'" alt=""
                                                width="125" class="shadow bg-white profile-picture" />
                                        </td>
                                    </tr>
                                    <div class="shadow bg-white rounded-5 profile">
                                        <tr>
                                            <th class="results-nev mt-2">
                                                <h3>{{ $employee->name }}</h3>
                                            </th>

                                            <td class="results-szakma mt-3">

                                                @foreach (\App\Models\City::where('id', '=', '' . $employee->city_id)->get() as $cities)
                                                    {{ $cities->city }}
                                                @endforeach

                                            </td>
                                            <td rowspan="4">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">
                                                @foreach (\App\Models\Field_Employee::where('employee_id', '=', '' . $employee->id)->distinct()->get() as $fieldsId)
                                                    @foreach (\App\Models\Field::where('id', '=', '' . $fieldsId->field_id)->get() as $fields)
                                                        <div class="mb-2 me-1 float-left">
                                                            <span class="field shadow bg-white">{{ $fields->field }}</span>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="results-overflow ms-2">
                                                <p class="mt-3 description">{{ $employee->description }}</p>
                                            </td>
                                        </tr>
                                    </div>
                                </table>
                            </div>
                            <div class="col-md-2">
                                <div class="ms-5 valami">
                                    <button class="btn btn-warning btn-lg shadow-lg rounded-3 float-left me-5 valami"
                                        type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg>
                                    </button>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-md-2">
                </div>
                <div class="col-md-12">
                    <br><br>
                </div>
            @endforeach
            <div class="d-flex">
                <div class="mx-auto">
                    {{ $results->links('layouts.paginationlinks') }}
                </div>
            </div>


            <style>
                .w-5 {
                    display: none;
                    /* eltünteti a nagy nyilakat a lap aljáról amik bugosan jelennek meg */
                }
            </style>
        @endif
    </div>
@endsection
