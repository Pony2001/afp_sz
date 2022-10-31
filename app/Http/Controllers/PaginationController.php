<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaginationController extends Controller
{
    public function search(Request $request)
    {



        if (request('search') && !request('county') && !request('city') && !request('field')) {

            $search = request('search');

            $result = DB::table('employees')
                ->select('*')
                //->distinct()
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->paginate(3);

            $result->appends($request->all());

            return view(
                'results',
                [
                    'results' => $result
                ]
            );
        } else if (!request('search')) {



            if (request('city') && request('county') && !request('field')) {


                $search_city = request('city');

                $result = DB::table('employees')
                    ->select('*')
                    //->distinct()
                    ->where('city_id', 'LIKE', '' . $search_city . '')->paginate(3);

                //dd($result);

                //$result = DB::table('employees')->where('city_id', 'LIKE', '' . $search_city . '')->paginate(3);
                $result->appends($request->all());




                return view(
                    'results',
                    [
                        'results' => $result
                    ]
                );
            } else if (!request('county') && !request('city') && request('field')) {

                $search_field = request('field');

                $result = DB::table('employees')
                    ->select(
                        'employees.id',
                        'employees.name',
                        'employees.city_id',
                        'cities.county_id',
                        'employees.phone',
                        'employees.email',
                        'employees.description'
                    )
                    ->join('cities', 'employees.city_id', '=', 'cities.id')
                    ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
                    //->distinct()
                    ->where('field__employees.field_id', 'LIKE', '' . $search_field . '')
                    ->paginate(3);

                $result->appends($request->all());
                return view(
                    'results',
                    [
                        'results' => $result
                    ]
                );
            } else if (request('county') && !request('city') && !request('field')) {

                $search_county = request('county');

                $result = DB::table('employees')
                    ->select(
                        'employees.id',
                        'employees.name',
                        'employees.city_id',
                        'cities.county_id',
                        'employees.phone',
                        'employees.email',
                        'employees.description'
                    )
                    ->join('cities', 'employees.city_id', '=', 'cities.id')
                    //->distinct()
                    ->where('cities.county_id', 'LIKE', '' . $search_county . '')
                    ->paginate(3);

                $result->appends($request->all());
                return view(
                    'results',
                    [
                        'results' => $result
                    ]
                );
            } else if (request('county') && request('city') && request('field')) {
                $search_county = request('county');
                $search_city = request('city');
                $search_field = request('field');

                $result = DB::table('employees')
                    ->select(
                        'employees.id',
                        'employees.name',
                        'employees.city_id',
                        'cities.county_id',
                        'employees.phone',
                        'employees.email',
                        'employees.description'
                    )
                    ->join('cities', 'employees.city_id', '=', 'cities.id')
                    ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
                    //->distinct()
                    ->where('city_id', 'LIKE', '' . $search_city . '')
                    ->where('cities.county_id', 'LIKE', '' . $search_county . '')
                    ->where('field__employees.field_id', 'LIKE', '' . $search_field . '')
                    ->paginate(3);

                $result->appends($request->all());
                return view(
                    'results',
                    [
                        'results' => $result
                    ]
                );
            } else if (request('county') && request('field') && !request('city')) {
                $search_county = request('county');
                $search_field = request('field');

                $result = DB::table('employees')
                    ->select(
                        'employees.id',
                        'employees.name',
                        'employees.city_id',
                        'cities.county_id',
                        'employees.phone',
                        'employees.email',
                        'employees.description'
                    )
                    ->join('cities', 'employees.city_id', '=', 'cities.id')
                    ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
                    //->distinct()
                    ->where('cities.county_id', 'LIKE', '' . $search_county . '')
                    ->where('field__employees.field_id', 'LIKE', '' . $search_field . '')
                    ->paginate(3);


                $result->appends($request->all());
                return view(
                    'results',
                    [
                        'results' => $result
                    ]
                );
            }
        } else {
            return redirect('home');
        }
    }
}
