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
        $employees = Employee::inRandomOrder()->get();

        foreach (range(1, 1000) as $index) {
            $employee = $employees->pop();
            $fields_employees = new Field_Employee;
            $fields_employees->field_id = Field::inRandomOrder()->first()->id;
            $fields_employees->employee_id = $employee->id; //minden employee kap egy field_id -t
            $fields_employees->save();
        }
        foreach (range(1, 621) as $index) {
            $employee = $employees->pop();
            $fields_employees = new Field_Employee;
            $fields_employees->field_id = Field::inRandomOrder()->first()->id;
            $fields_employees->employee_id = Employee::inRandomOrder()->first()->id; //valamely employee kap még egy field_id -t
            $fields_employees->save();
        }
    }
}
