<?php

namespace App\Http\Controllers;

use App\Rules\FieldRules;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create()
    {

        $field = DB::table('fields')->select('*')->get();
        return view('create', [
            'fields' => $field
        ]);
    }

    public function created(Request $request)
    {

        request()->validate([
            'name' => ['required'],
            'city' => ['required'],
            'fields' => ['required', new FieldRules],
            'phone' => ['required', 'numeric', 'unique:employees', 'regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'],
            'email' => ['required', 'email', 'unique:employees'],
            'description' => ['required']
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
        for ($i = 0; $i < request('total_chq'); $i++) {
            $created2 = DB::table('field__employees')
                ->insert([
                    'created_at' => date(now()),
                    'updated_at' => date(now()),
                    'employee_id' => $employeeId[0]->id,
                    'field_id' => $request->fields[$i]
                ]);
        }

        return redirect('admin')->with('alert', 'Létrehozva!');
    }
}
