<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(Request $request)
    {
        //$cities = City::whereCounty($request->county_id)->orderBy('city')->get();
        $cities = DB::table('employees')
        ->select('cities.id','cities.city')->distinct()
        ->join('cities','employees.city_id','=','cities.id')
        ->where('cities.county','like',$request->county_id)
        ->orderBy('cities.city')
        ->get();
        return $cities;
    }
}
