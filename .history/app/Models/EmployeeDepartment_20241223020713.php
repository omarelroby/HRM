<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class departments extends Model
{
    protected $table = 'employee_departments';
    protected $fillable = ['employee_id', 'email', 'phone', 'address'];
}
