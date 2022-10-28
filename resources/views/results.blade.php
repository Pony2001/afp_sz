<?php

use App\Models\Field_Employee;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>

@extends('layouts.main')

@section('content')
    <h2>Eredmények</h2>


    <div class="row">
        @foreach ($results as $result)
            <div class="col-md-3">
            </div>
            <div class="col-md-6 shadow bg-white rounded-5 listss">
                <form action="/profile/{{ $result->id }}" class="profile">
                    <table>
                        <tr>
                            <td rowspan="4"><img src="/images/unknown.png" alt="" width="125"
                                    class="shadow bg-white profile-picture">
                            </td>
                        </tr>
                        <div class="shadow bg-white rounded-5 profile">
                            <tr>
                                <th class="results-nev mt-2">
                                    <h3>{{ $result->name }}</h3>
                                </th>





                                <td class="results-szakma mt-3">{{ $result->city }}</td>
                                <td rowspan="4"><button class="btn btn-warning rounded-5"
                                        type="submit">Megtekint</button>
                                </td>
                            </tr>
                            <tr>

                                <td class="p-2">
                                    <p> field_id:
                                        @foreach (\App\Models\Field_Employee::where('employee_id', '=', '' . $result->id)->get() as $resu)
                                            {{ $resu->field_id }},
                                        @endforeach
                                    </p>
                                </td>

                            </tr>
                            <tr>
                                <td class="results-overflow m-2">{{ $result->description }}</td>
                            </tr>
                        </div>
                    </table>
                </form>

            </div>

            <div class="col-md-3">
            </div>
            <div class="col-md-12">
                <br><br>
            </div>
        @endforeach
        <div class="col-md-5"></div>
        <div class="col-md-2 center">

            {{ $results->links('layouts.paginationlinks') }}
        </div>
        <div class="col-md-5"></div>


        <style>
            .w-5 {
                display: none;
            }
        </style>
    </div>
@endsection
