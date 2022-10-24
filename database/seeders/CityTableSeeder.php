<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\County;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cities = new City;
        //$cities->Foreign('county_id')->references('county_id')->on('counties');
        $cities->county_id = County::inRandomOrder()->first()->id;
        $cities->city = fake()->unique()->text(15);
        $cities->save();
    }
}
