<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertController extends Controller
{
    public function insert (){
        return view ('insert');
    }
    public function edit_function($id)
    {
       // $employee = DB::select('select * from employees where id = ?', [$id]);
        $employee = DB::table('employees')->select('*')
        ->join('cities','employees.city_id', '=', 'cities.id')
        ->where('employees.id','=',$id)
       ->get();
     
 
        return view('insert', ['employee' => $employee]);
    }
}
