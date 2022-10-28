<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function selectEmployee(){
        $employee = DB::table('employees')->select('*')->orderBy('name')->get();
      return $employee;
    }
    public function selectField(){
        $field = DB::table('fields')->select('*')->orderBy('field')->get();

        return $field;
    }
    public function selectCounty(){
        $county = DB::table('counties')->select('*')->orderBy('county')->get();


        return $county;
    }
    public function selectCity(){
        $city = DB::table('cities')->select('*')->orderBy('city')->get();
        return $city;
    }
    public function selectField_Employee(){
        $field_employee = DB::table('Field__Employees')->select('*')->orderBy('id')->get();

        return $field_employee;
    }


    public function admin (){
        return view ('admin',[
        'employee' =>  $this->selectEmployee(),
        'field'=> $this->selectField(),
        'county'=> $this->selectCounty(),
        'city'=> $this->selectCity(),
        'field_employee'=> $this->selectField_Employee()
    ]);
    }
    
}
