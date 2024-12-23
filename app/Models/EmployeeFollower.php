<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeFollower extends Model
{
    protected $guarded  = ['id'];

    protected $casts = [
        'documents' => 'array'
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id')->first();
    }
}
