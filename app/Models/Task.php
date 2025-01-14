<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public $table = 'tasks';
    public function employee()
    {
        return $this->belongsTo(Employee::class ,'employee_id');
    }
}

