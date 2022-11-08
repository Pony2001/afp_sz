<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = new image;
        $images->employee_id = Employee::inRandomOrder()->first()->id;
        $images->profile = "profil";
        $images->ref1 = 42;
        $images->ref2 = 77;
        $images->ref3 = 143;
        $images->ref4 = 163;
        $images->save();
    }
}
