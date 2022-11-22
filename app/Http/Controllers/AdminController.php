<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function selectEmployee()
    {
        $employee = DB::table('employees')->select('*')->orderBy('id')->get();
        return $employee;
    }
    public function selectField()
    {
        $field = DB::table('fields')->select('*')->orderBy('id')->get();

        return $field;
    }
    public function selectCounty()
    {
        $county = DB::table('cities')->select('*')->orderBy('id')->get();


        return $county;
    }
    public function selectCity()
    {
        $city = DB::table('cities')->select('*')->orderBy('id')->get();
        return $city;
    }
    public function selectField_Employee()
    {
        $field_employee = DB::table('Field__Employees')->select('*')->orderBy('id')->get();

        return $field_employee;
    }

    public function newView()
    {
        $results = DB::table('employees')
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
            ->groupBy('employees.id')
            ->orderBy('employees.id')
            ->get();

        return ($results);
    }

    public function admin()
    {
        return view('admin', [
            'employee' =>  $this->selectEmployee(),
            'field' => $this->selectField(),
            'county' => $this->selectCounty(),
            'city' => $this->selectCity(),
            'field_employee' => $this->selectField_Employee(),
            'newview' => $this->newView()
        ]);
    }

    public function delete($id)
    {
        $deleted = DB::table('employees')->where('id', '=', $id)->delete();
        $deleted2 = DB::table('field__employees')->where('employee_id', '=', $id)->delete();
        return redirect()->back()->with('alert', 'Törölve!');
    }
}
