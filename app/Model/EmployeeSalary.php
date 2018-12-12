<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends BaseModel
{
    protected $table = 'employees_salary';

    protected $fillable = [
        'employee_id',
        'note',
        'salary_advance',
        'month',
        'hours'
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
