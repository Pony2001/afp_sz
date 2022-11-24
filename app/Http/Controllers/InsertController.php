<?php

namespace App\Http\Controllers;

use App\Rules\FieldRules;
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
            //->where('field__employees.id', '=', $other)
            ->get();

        $employeeLength = count($employee);

        //dd($field_id);
      

    $image = DB::table('images')->select('ref') ->where('employee_id', '=', $id)->get();

       $ref = explode(';', (string)$image);

        $employeeId = DB::table('employees')
            ->select('*')
            ->where('id', '=', $id)->get();
        $field = DB::table('fields')->select('*')->get();

        return view('insert', [
            'employee' => $employee,
            'ref' => $ref,
            'fields' => $field,
            'employeeLength' => $employeeLength
        ]);
    }
    public function update_button($id, Request $request)
    {
        // $employee = DB::select('select * from employees where id = ?', [$id]);
        // $employee = DB::table('employees')->update('name','cities.city','phone','email','description')
        // ->join('cities','employees.city_id', '=', 'cities.id')
        // ->where('employees.id','=',$id);
      
        //dd($request);

       


        request()->validate([
            'name' => ['required'],
            'city' => ['required'],
            'fields' =>['required', new FieldRules],
            'phone' => ['required', 'numeric', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'],
            'email' => ['required', 'email'],
            'description' => ['required']
        ]);


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
        //dd($other, $id);
            // dd($request->fields);
      
        DB::table('field__employees')
            ->join('employees', 'field__employees.employee_id', '=', 'employees.id')
            ->where('employees.id', '=', $id)
            ->delete();

        for ($i = 0; $i < request('total_chq'); $i++) {

            DB::table('field__employees')
                ->insert([
                    'created_at' => date(now()),
                    'updated_at' => date(now()),
                    'employee_id' => $id,
                    'field_id' => request('A_' . $i + 1)
                ]);
        }

        return redirect('admin')->with('alert', 'Frissítve!');
    }
}
