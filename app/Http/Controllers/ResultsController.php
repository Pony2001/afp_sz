<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultsController extends Controller
{


    // public function getEmployees()
    // {

    //     $search = '';
    //     $field = '';
    //     $city = '';

    //     //Search
    //     if (request('search')) {
    //         $search = "
    //         description like '%" . request('search') . "%' OR
    //         name like '%" . request('search') . "%' OR
    //         email like '%" . request('search') . "%' OR
    //         phone like '%" . request('search') . "%'
    //         ";
    //     } else if (!request('search') && request('city')) {
    //         //City
    //         $city = "city_id LIKE '" . request('city') . "'";
    //     } else if (!request('search') && !request('city')) {
    //         $field = "field_id LIKE '" . request('field') . "'";
    //     }

    //     //Lekérdezés
    //     $link = mysqli_connect('localhost', 'root', '', 'szakimaki');

    //     $sql = "SELECT * FROM employees WHERE " . $city . " " . $search . "";

    //     $ret = []; // for return
    //     if ($result = mysqli_query($link, $sql)) {
    //         if (mysqli_num_rows($result) > 0) {

    //             while ($row = mysqli_fetch_array($result)) {
    //                 $ret[] = $row;
    //             }
    //         }
    //     }
    //     return $ret;
    // }

    // public function searchCities()
    // {
    //     if (request('city')) {
    //         $whereCity = "where('cities.city', 'LIKE', request('city'))";
    //     } else $whereCity = "";

    //     $results = DB::table('employees')
    //         ->select(
    //             'employees.id',
    //             'cities.county_id',
    //             'counties.county',
    //             'cities.id AS city_id',
    //             'cities.city',
    //             'employees.city_id',
    //             'employees.name',
    //             'field__employees.field_id',
    //             'fields.field',
    //             'employees.phone',
    //             'employees.email',
    //             'employees.description'
    //         )
    //         ->join('cities', 'employees.city_id', '=', 'cities.id')
    //         ->join('counties', 'cities.county_id', '=', 'counties.id')
    //         ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
    //         ->join('fields', 'field__employees.field_id', '=', 'fields.id')
    //         ->where('employees.id', '=', '5')
    //         ->get();

    //     dd($results);

    //     return ($results);
    // }

    // public function search(Request $request)
    // {

    //     // if (isset($_GET['city'])) {

    //     //     return view('results', ['cities' => $cities]);
    //     // } else {
    //     //     return view('home');
    //     // }
    // }

    // public function store(Request $request)
    // {

    //     // request()->validate([
    //     //     'search' => ['max:255'],
    //     //     'field' => ['max:255'],
    //     //     'county' => ['max:255'],
    //     //     'city' => ['max:255']
    //     // ]);

    //     $search_city = $_GET['city'];
    //     $result = DB::table('employees')->where('city_id', 'LIKE', '' . $search_city . '')->paginate(3);

    //     return view('results', [
    //         'valami' => $this->searchCities(),
    //         'employees' => $this->getEmployees(),

    //         'results' => $result
    //     ]);
    //     //'employees' == $employees
    // }
}
