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

    public function create2Submit(Request $request, $id)
    {

        $employeeId = DB::table('employees')
            ->select('*')
            ->where('id', '=', $id)->limit(1)->get();

        //dd($employeeId[0]->id);

        //dd(request('total_chq'));
        for ($i = 0; $i < request('total_chq'); $i++) {

            request()->validate([
                'new_' . $i + 1 => ['required']
            ]);
        }

        for ($i = 0; $i < request('total_chq'); $i++) {

            DB::table('field__employees')
                ->insert([
                    'created_at' => date(now()),
                    'updated_at' => date(now()),
                    'employee_id' => $employeeId[0]->id,
                    'field_id' => request('new_' . $i + 1)
                ]);
        }
        return redirect('admin')->with('alert', 'Létrehozva!');
    }
}
