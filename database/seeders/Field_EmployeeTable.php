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
        foreach (range(1, 10) as $index) {
            $fields_employees = new Field_Employee;
            $fields_employees->field_id = Field::inRandomOrder()->first()->id;
            $fields_employees->employee_id = Employee::inRandomOrder()->first()->id; //minden employee-nak kéne legalább egy field_id
            $fields_employees->save();
        }
    }
}
