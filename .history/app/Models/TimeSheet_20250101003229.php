<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'hours',
        'remark',
        'remark_ar',
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id');
    }

    public function employees()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
}

