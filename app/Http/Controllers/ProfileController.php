<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function edit_function($id)
    {
        $employee = DB::select('select * from employees where id = ?', [$id]);
        return view('profile', ['employee' => $employee]);
    }
}
