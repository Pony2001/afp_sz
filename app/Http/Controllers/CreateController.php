<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create(){
        return view('create');
    }

    public function created(){
        $created = DB::table('employee')
        ->join('cities','employees.city_id', '=', 'cities.id')
        ->insert(['name' => $name,
                  'cities.city' => $city,
                  'phone' => $phone,
                  'email' => $email,
                  'desctiption' => $description
      ]);
        return redirect()->back()->with('alert', 'Új szaki hozzádva!');
     }
}
