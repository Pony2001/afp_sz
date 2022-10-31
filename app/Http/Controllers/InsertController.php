<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsertController extends Controller
{
    public function insert()
    {
        return view('insert');
    }
    public function edit_function($id)
    {
        // $employee = DB::select('select * from employees where id = ?', [$id]);
        $employee = DB::table('employees')->select('*')
            ->join('cities', 'employees.city_id', '=', 'cities.id')
            ->where('employees.id', '=', $id)
            ->get();


        return view('insert', ['employee' => $employee]);
    }
    public function update_button($id)
    {
        // $employee = DB::select('select * from employees where id = ?', [$id]);
        // $employee = DB::table('employees')->update('name','cities.city','phone','email','description')
        // ->join('cities','employees.city_id', '=', 'cities.id')
        // ->where('employees.id','=',$id);

        $update = DB::table('employees')
            ->where('employees.id', '=', $id)
            ->update([
                'name' => request('name'),
                'updated_at' => date(now()),
                'city_id' => request('city'),
                'phone' => request('phone'),
                'email' => request('email'),
                'description' => request('description')

            ]);
        // $update2 = DB::table('field__employees')
        //     ->where('employee_id', '=', $id)
        //     ->update([
        //         'field_id' => request('field'),
        //         'updated_at' => date(now())

        //     ]);


        return redirect('admin')->with('alert', 'Frissítve!');
    }
}
