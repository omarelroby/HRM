<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Department extends Model
{
    protected $table = 'departments';
    protected $fillable = ['employee_id', 'name', 'name_ar'];
}
