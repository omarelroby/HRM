<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceEmployee extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'status',
        'clock_in',
        'clock_out',
        'in_company_range',
        'lat',
        'lon',
        'late',
        'early_leaving',
        'overtime',
        'total_rest',
        'delay_reason',
        'created_by',
    ];

    public function employees()
    {
        return $this->hasOne('App\Models\Employee', 'user_id', 'employee_id');
    }


    public function employee()
    {
        return $this->belongsTo('App\Models\Employee',   'employee_id');
    }
}
