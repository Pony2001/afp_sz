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

    public function created()
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
        // $created2 = DB::table('field__employees')
        //     ->insert([

        //         'created_at' => date(now()),
        //         'updated_at' => date(now()),
        //         'field_id' => request('field')
        //     ]);


        return redirect('admin')->with('alert', 'Új szaki hozzádva!');
    }
}
