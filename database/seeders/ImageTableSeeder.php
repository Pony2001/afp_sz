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
        foreach (range(1, 2000) as $index) {
        $rnd1 = random_int(0,255);
        $rnd2 = random_int(0,255);
        $rnd3 = random_int(0,255);
        $rnd4 = random_int(0,255);
        $rnd5 = random_int(0,255);
        $rnd6 = random_int(0,255);
        $images = new image;
        $images->employee_id = Employee::InrandomOrder()->first()->id;
        $images->profile = "profil";
        $images->ref = $rnd1.";".$rnd2.";".$rnd3.";".$rnd4.";".$rnd5.";".$rnd6;
       // $images->ref2 = 77;
      //  $images->ref3 = 143;
       // $images->ref4 = 163;
        $images->save();
        }
    }
}
