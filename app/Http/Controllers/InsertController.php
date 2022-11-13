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
    public function edit_function($id, $other)
    {
        // $employee = DB::select('select * from employees where id = ?', [$id]);
        $employee = DB::table('employees')
            ->select(
                'employees.id',
                'cities.county',
                'cities.id AS city_id',
                'cities.city',
                'employees.city_id',
                'employees.name',
                'field__employees.field_id',
                'fields.field',
                'employees.phone',
                'employees.email',
                'employees.description',
                'field__employees.id AS other'
            )
            ->join('cities', 'employees.city_id', '=', 'cities.id')
            ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
            ->join('fields', 'field__employees.field_id', '=', 'fields.id')
            ->where('employees.id', '=', $id)
            ->where('field__employees.id', '=', $other)
            ->get();

        //dd($field_id);
        $image = DB::table('images')->select('ref')->where('employee_id', '=', $id)->get();


        $ref = explode(';', (string)$image);

        return view('insert', ['employee' => $employee, 'ref' => $ref]);
    }
    public function update_button($id, $other)
    {
        // $employee = DB::select('select * from employees where id = ?', [$id]);
        // $employee = DB::table('employees')->update('name','cities.city','phone','email','description')
        // ->join('cities','employees.city_id', '=', 'cities.id')
        // ->where('employees.id','=',$id);

        $update = DB::table('employees')


            ->where('employees.id', '=', $id)
            ->update([
                'employees.name' => request('name'),
                'employees.updated_at' => date(now()),
                'employees.city_id' => request('city'),
                'employees.phone' => request('phone'),
                'employees.email' => request('email'),
                'employees.description' => request('description')

            ]);
        $update2 = DB::table('field__employees')
            ->where('employee_id', '=', $id)
            ->where('id', '=', $other)
            ->update([
                'field_id' => request('field'),
                'updated_at' => date(now())
            ]);


        return redirect('admin')->with('alert', 'Frissítve!');
    }
}
