<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class EmployeeD extends Model
{
     protected $fillable = ['name', 'email', 'phone', 'address'];
}
