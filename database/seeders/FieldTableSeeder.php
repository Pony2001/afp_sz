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
        foreach (range(1, 50) as $index) {
            $fields = new Field;
            $fields->field = fake()->unique()->word();
            $fields->save();
        }
    }
}
