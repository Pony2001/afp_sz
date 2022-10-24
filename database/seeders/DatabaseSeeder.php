<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CountyTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(FieldTableSeeder::class);
        $this->call(Field_EmployeeTable::class);
        $this->call(ImageTableSeeder::class);
        \App\Models\User::County()->create();
        \App\Models\User::City()->create();
        \App\Models\User::Employee()->create();
        \App\Models\User::Field()->create();
        \App\Models\User::Field_Employee()->create();
        \App\Models\User::Image()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
