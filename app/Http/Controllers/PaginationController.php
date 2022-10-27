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

            $city = DB::table('cities')->where('id', 'LIKE', '' . $search_city . '')->get('city');

            $result = DB::table('employees')->where('city_id', 'LIKE', '' . $search_city . '')->paginate(3);
            $result->appends($request->all());
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
