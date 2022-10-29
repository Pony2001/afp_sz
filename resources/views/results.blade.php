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
                    <table>
                        <tr>
                            <td rowspan="4"><img src='https://www.gravatar.com/avatar/{{md5($employee -> email)}}?s=32&d=identicon&r=PG'
                                    alt="" width="125" class="shadow bg-white profile-picture">
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
                                <td rowspan="4"><button class="btn btn-warning rounded-5"
                                        type="submit">Megtekint</button>
                                </td>
                            </tr>
                            <tr>

                                <td class="p-2">
                                    <p> Szakma:
                                        @foreach (\App\Models\Field_Employee::where('employee_id', '=', '' . $employee->id)->get() as $fieldsId)
                                            
                                            @foreach (\App\Models\Field::where('id', '=', '' . $fieldsId->field_id)->get() as $fields)
                                                {{ $fields->field }},
                                            @endforeach
                                        @endforeach
                                    </p>
                                </td>

                            </tr>
                            <tr>
                                <td class="results-overflow m-2">{{ $employee->description }}</td>
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
