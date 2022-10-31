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
        $employee = DB::table('employees')->select('*')
        ->join('cities','employees.city_id', '=', 'cities.id')
        ->where('employees.id','=',$id)
       ->get();
       $comment = DB::table('comments')->select('value','comment')
       ->orderByDesc('value')
       ->where('employee_id','=',$id)
       ->get();
      // $emp_id = DB::table('employees')->select('id')->where('id','=',$id)->get();
        return view('profile', ['employee' => $employee,'comment' => $comment,'emp_id' => $id]);
    }

    
    public function create_comment()
    {
    $created = DB::table('comments')
     ->insert([
        'created_at' => date(now()),
        'updated_at' => date(now()),
        'employee_id' => request('id'),
        'value' =>request('value'),
        'comment' => request('comment')
    ]);
    return redirect()->back()->with('alert', 'Új vélemény hozzádva!');
    }
  




}
