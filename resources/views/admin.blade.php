<?php
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
?>
@extends('layouts.main')




@section('content')
    <hr>
    <h2 align="center">Szakik</h2>
    <div style="display: block; margin:0 auto">
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Név</th>
                <th>Email</th>
                <th>Telefonszám</th>
                <th>Műveletek</th>
            </tr>
            @foreach ($employee as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="/profile/{{ $item->id }}" class="mr-3" title="Megtekint" data-toggle="tooltip"><span
                                class="fa fa-eye"></span></a>
                        <a href="/insert/{{ $item->id }}" class="mr-3" title="Módosít" data-toggle="tooltip"><span
                                class="fa fa-pencil"></span></a>
                        <a href="#" title="Törlés" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            @endforeach


        </table>
    </div>
    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Szakmák</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Szakma</th>

            </tr>
            @foreach ($field as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->field }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Megyék</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Megye</th>

            </tr>
            @foreach ($county as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->county }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Városok</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Város</th>

            </tr>
            @foreach ($city as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->city }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Szakma-szaki</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>ID</th>
                <th>Létrehozva</th>
                <th>Frissítve</th>
                <th>Szakma_id</th>
                <th>Szaki_id</th>


            </tr>
            @foreach ($field_employee as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>{{ $item->field_id }}</td>
                    <td>{{ $item->employee_id }}</td>
                </tr>
            @endforeach
        </table>
    </div>


    <hr>
    <div style="display: block; margin:0 auto">
        <h2 align="center">Zsoltinak speciálba</h2>
        <table class="table table-striped table-dark ">
            <tr>
                <th>id</th>
                <th>county_id</th>
                <th>county</th>
                <th>city_id</th>
                <th>city</th>
                <th>name</th>
                <th>field_id</th>
                <th>field</th>
                <th>phone</th>
                <th>email</th>


            </tr>
            @foreach ($newview as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->county_id }}</td>
                    <td>{{ $item->county }}</td>
                    <td>{{ $item->city_id }}</td>
                    <td>{{ $item->city }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->field_id }}</td>
                    <td>{{ $item->field }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
