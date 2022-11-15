<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new user;
        $users->name = 'Anonymus';
        $users->username = "admin";
        $users->email = 'admin@admin.adm';
        $users->password = Hash::make('admin123');
        $users->save();
    }
}
