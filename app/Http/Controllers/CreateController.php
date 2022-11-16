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


        request()->validate([
            'name' => ['required'],
            'city' => ['required'],
            'description' => ['required'],
            'phone' => ['required', 'unique:employees'],
            'email' => ['required', 'unique:employees'],

        ]);



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


        $rnd1 = random_int(1, 1083);
        $rnd2 = random_int(1, 1083);
        $rnd3 = random_int(1, 1083);
        $rnd4 = random_int(1, 1083);
        $rnd5 = random_int(1, 1083);
        $rnd6 = random_int(1, 1083);

        $images =  DB::table('images')
            ->insert([
                'created_at' => date(now()),
                'updated_at' => date(now()),
                'employee_id' => $employeeId[0]->id,
                'ref' => $rnd1 . ";" . $rnd2 . ";" . $rnd3 . ";" . $rnd4 . ";" . $rnd5 . ";" . $rnd6
            ]);
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
