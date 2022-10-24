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
    public function getCounties()
    {

        $link = mysqli_connect('localhost', 'root', '', 'szakimaki');



        $sql = "SELECT DISTINCT county FROM counties";

        $return = [];
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $return[] = $row;
                }
            }
        }

        return $return;
    }

    public function getCities()
    {

        $link = mysqli_connect('localhost', 'root', '', 'szakimaki');


        $sql = "SELECT DISTINCT city FROM cities";

        $return = [];
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $return[] = $row;
                }
            }
        }

        return $return;
    }



    public function main()
    {
        return view(
            'home',
            [
                //'fields' => $this->getFields(),
                'cities' => $this->getCities(),
                'counties' => $this->getCounties()
            ]
        );
    }
}
