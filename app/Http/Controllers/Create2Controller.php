<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;

class Create2Controller extends Controller
{

    public function create2($id)
    {

        $employeeId = DB::table('employees')
            ->select('*')
            ->where('id', '=', $id)->get();
        $field = DB::table('fields')->select('*')->get();
        return view('create2', [
            'employee' => $employeeId,
            'fields' => $field
        ]);
    }
}
