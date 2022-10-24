<?php

namespace Database\Seeders;
use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields= new Field;
        $fields->field= fake()->text(10);
        $fields-> save();
    }
}
