<?php

namespace Database\Seeders;

use App\Models\Field_Employee;
use App\Models\Field;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Field_EmployeeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields_employees = new Field_Employee;
        $fields_employees->field_id = Field::inRandomOrder()->first()->id;
        $fields_employees->employee_id = Employee::inRandomOrder()->first()->id;
        $fields_employees->save();
    }
}
