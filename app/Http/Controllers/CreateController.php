<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function created(Request $request)
    {
        $created = DB::table('employees')
            ->insert([
                'name' => request('name'),
                'created_at' => date(now()),
                'updated_at' => date(now()),
                'city_id' => request('city'),
                'phone' => request('phone'),
                'email' => request('email'),
                'description' => request('description')
            ]);
        $employeeId = DB::table('employees')
            ->select('*')
            ->where('email', '=', request('email'))->limit(1)->get();
        //dd($employeeId[0]->id);
        // $created2 = DB::table('field__employees')
        //     ->insert([
        //         'created_at' => date(now()),
        //         'updated_at' => date(now()),
        //         'employee_id' => $employeeId[0]->id,
        //         'field_id' => request('field')
        //     ]);

        return redirect('create2/' . $employeeId[0]->id);
    }
}
