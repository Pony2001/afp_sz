<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaginationController extends Controller
{
    public function search(Request $request)
    {

        if (request('city') && request('county')) {


            $search_city = request('city');

            $result = DB::table('employees')
                ->select(
                    'employees.id',
                    'cities.county_id',
                    'counties.county',
                    'cities.id AS city_id',
                    'cities.city',
                    'employees.city_id',
                    'employees.name',
                    'field__employees.field_id',
                    'fields.field',
                    'employees.phone',
                    'employees.email',
                    'employees.description'
                )
                ->join('cities', 'employees.city_id', '=', 'cities.id')
                ->join('counties', 'cities.county_id', '=', 'counties.id')
                ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
                ->join('fields', 'field__employees.field_id', '=', 'fields.id')
                ->where('city_id', 'LIKE', '' . $search_city . '')->paginate(3);

            //dd($result);


            //$result = DB::table('employees')->where('city_id', 'LIKE', '' . $search_city . '')->paginate(3);
            $result->appends($request->all());


            $city = DB::table('employees')
                ->select(
                    'employees.id',
                    'cities.county_id',
                    'counties.county',
                    'cities.id AS city_id',
                    'cities.city',
                    'employees.city_id',
                    'employees.name',
                    'field__employees.field_id',
                    'fields.field',
                    'employees.phone',
                    'employees.email',
                    'employees.description'
                )
                ->join('cities', 'employees.city_id', '=', 'cities.id')
                ->join('counties', 'cities.county_id', '=', 'counties.id')
                ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
                ->join('fields', 'field__employees.field_id', '=', 'fields.id')
                ->where('cities.id', 'LIKE', '' . $search_city . '')
                //->groupBy('employees.id') //phpMyAdmin-ban az SQL lekérdezés működik ami itt "hibás"  ¯\_(ツ)_/¯
                ->get();


            return view(
                'results',
                [
                    'results' => $result,
                    'cities' => $city
                ]
            );
        } else {
            return view('home');
        }
    }
}
