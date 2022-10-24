<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(Request $request)
    {
        $cities = City::whereCountyId($request->county_id)->orderBy('city')->get();
        return $cities;
    }
}
