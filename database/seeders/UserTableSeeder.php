<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $users->name = fake()->name(2);
        $users->username = "admin";
        $users->email = fake()->safeEmail();
        $users->password = "admin";
        $users->save();
    }
}
