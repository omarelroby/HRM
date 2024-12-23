<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class EmployeeDepartment extends Model
{
    protected $table = 'employee_departments';
        protected $fillable = ['name', 'email', 'phone', 'address'];
}
