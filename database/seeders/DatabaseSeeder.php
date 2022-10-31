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
        $this->call(FieldTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(Field_EmployeeTable::class);
        $this->call(ImageTableSeeder::class);
        $this->call(UserTableSeeder::class);
        //$this->call(CommentTableSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
