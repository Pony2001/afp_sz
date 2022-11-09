<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Employee;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function edit_function($id)
    {
        // $employee = DB::select('select * from employees where id = ?', [$id]);
        $employee = DB::table('employees')
            ->select(
                'employees.id',
                'cities.county',
                'cities.id AS city_id',
                'cities.city',
                'employees.name',
                'field__employees.field_id',
                'fields.field',
                'employees.phone',
                'employees.email',
                'employees.description'
            )
            ->join('cities', 'employees.city_id', '=', 'cities.id')
            ->join('field__employees', 'employees.id', '=', 'field__employees.employee_id')
            ->join('fields', 'field__employees.field_id', '=', 'fields.id')
            //->groupBy('employees.id')
            ->where('employees.id', '=', $id)
            ->orderBy('employees.id')
            ->get();

         $image = DB::table('images')->select('ref')->where('employee_id', '=', $id)->get();   
          
       
            $ref = explode( ';', (string)$image);
         

               
          //var_dump( explode( ',', $input1 ) ); splittelés


        $comment = DB::table('comments')->select('value', 'comment')
            ->orderByDesc('value')
            ->where('employee_id', '=', $id)
            ->get();
        // $emp_id = DB::table('employees')->select('id')->where('id','=',$id)->get();
        return view('profile', ['employee' => $employee, 'comment' => $comment, 'emp_id' => $id, 'ref' => $ref]);

     
    }


    public function create_comment()
    {
        $created = DB::table('comments')
            ->insert([
                'created_at' => date(now()),
                'updated_at' => date(now()),
                'employee_id' => request('id'),
                'value' => request('value'),
                'comment' => request('comment')
            ]);
        return redirect()->back()->with('alert', 'Új vélemény hozzádva!');
    }
}
