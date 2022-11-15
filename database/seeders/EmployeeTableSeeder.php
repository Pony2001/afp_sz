<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Field;
use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (range(1, 1000) as $index) {
            $szolgaltato_array = array('20', '30', '70');
            $rnd2 = rand(0, 2);
            $szolgaltato = array_values($szolgaltato_array);

            $rnd3 = rand(1000000, 9999999);



            $employees = new employee;
            $employees->name = fake()->name(2);
            // $employees ->Foreign('city_id')->references('id')->on('cities')->nullable();
            //$employees->field_id = Field::inRandomOrder()->first()->id;
            $employees->city_id = City::inRandomOrder()->first()->id;
            $employees->email = fake()->safeEmail();
            $employees->phone = '06' . $szolgaltato[$rnd2] . $rnd3;
            $employees->description = fake()->text(200);
            $employees->save();
        }
            $employees = new employee;
            $employees->name = 'Bata Krisztián';
            $employees->city_id = City::where('city','like','Aszód')->first()->id;
            $employees->email = 'bata.krisztian97@gmail.com';
            $employees->phone = '06206107956';
            $employees->description = 'Egy a Weboldal készítői közül.';
            $employees->save();

            $employees = new employee;
            $employees->name = 'Csikós Zsolt Csaba';
            $employees->city_id = City::where('city','like','Jászárokszállás')->first()->id;
            $employees->email = 'csikoszs21@gmail.com';
            $employees->phone = '06202825192';
            $employees->description = 'Egy a Weboldal készítői közül.';
            $employees->save();
    }
    //Telefonszam 20 30 70


}
