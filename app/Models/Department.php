<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'employee_id',
        'created_by',
    ];

    public function branch(){
        return $this->hasOne('App\Models\Branch','id','branch_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }


    public function employeess()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
