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
        } else if (request('county') && !request('city')) {

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
        } else {
            return view('home');
        }
    }
}
