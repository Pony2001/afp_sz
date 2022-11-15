<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{

    /*
    public function getFields()
    {
        $link = mysqli_connect('localhost', 'root', '', 'szakimaki');

        $sql = "SELECT DISTINCT field FROM employees";

        $ret = []; // for return
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $ret[] = $row;
                }
            }
        }


        return $ret;
    }
*/
    // public function getCounties()
    // {

    //     $link = mysqli_connect('localhost', 'root', '', 'szakimaki');



    //     $sql = "SELECT DISTINCT county FROM counties";

    //     $return = [];
    //     if ($result = mysqli_query($link, $sql)) {
    //         if (mysqli_num_rows($result) > 0) {

    //             while ($row = mysqli_fetch_array($result)) {
    //                 $return[] = $row;
    //             }
    //         }
    //     }

    //     return $return;
    // }

    // public function getCitiess()
    // {

    //     $link = mysqli_connect('localhost', 'root', '', 'szakimaki');


    //     $sql = "SELECT DISTINCT city FROM cities ORDER BY city ASC";

    //     $return = [];
    //     if ($result = mysqli_query($link, $sql)) {
    //         if (mysqli_num_rows($result) > 0) {

    //             while ($row = mysqli_fetch_array($result)) {
    //                 $return[] = $row;
    //             }
    //         }
    //     }

    //     return $return;
    // }


    public function getCities()
    {

        $city = DB::table('employees')->select('employees.city_id', 'cities.county', 'cities.city')
            ->join('cities', 'employees.city_id', '=', 'cities.id')
            ->get();


        //dd(response()->json($city));
        //return response()->json($city);
        return $city;
    }


    public function getCounties()
    {
        $results = DB::table('employees')
            ->select('cities.county')->distinct()
            ->join('cities', 'employees.city_id', '=', 'cities.id')
            ->get();

        return $results;
    }

    public function getOldFields()
    {

        $results = DB::table('fields')
            ->select('id', 'field')
            ->get();

        return $results;
    }

    public function getFields()
    {

        $results = DB::table('employees')
            ->select('fields.id', 'fields.field')->distinct()
            ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
            ->join('fields', 'field__employees.field_id', '=', 'fields.id')
            ->get();

        return $results;
    }




    public function main()
    {
        return view(
            'home',
            [
                'counties' => $this->getCounties(),
                'fields' => $this->getFields(),
                'oldFields' => $this->getOldFields()
            ]
        );
    }
}
