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
    <h2>Eredmények</h2>


    <div class="row">
        @foreach ($results as $employee)
            <div class="col-md-2">
            </div>
            <div class="col-md-8 shadow bg-white rounded-5 listss">
                <form action="/profile/{{ $employee->id }}" class="profile">
                    <style>
                        table,
                        tr,
                        td,
                        th {
                            border: solid 0px;
                        }
                    </style>
                    <table>
                        <tr>
                            <td rowspan="4">
                                <img src="https://picsum.photos/id/{{ $employee->id }}/200"
                                    onerror="this.onerror=null; this.src='/images/unknown.png'" alt="" width="125"
                                    class="shadow bg-white profile-picture" />
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
                                <td rowspan="4"><button class="btn btn-warning shadow rounded-5"
                                        type="submit">Megtekint</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-2">
                                    @foreach (\App\Models\Field_Employee::where('employee_id', '=', '' . $employee->id)->distinct()->get() as $fieldsId)
                                        @foreach (\App\Models\Field::where('id', '=', '' . $fieldsId->field_id)->get() as $fields)
                                            <span class="field shadow bg-white">{{ $fields->field }}</span>
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
    </div>
@endsection
