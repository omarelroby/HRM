<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_shift extends Model
{
    protected $table = 'employee_shifts';

    protected $fillable = [
        'name',
        'name_ar',
        'shift_days',
        'shift_starttime',
        'shift_endtime',
        'buffer_time',
        'shift_startdate',
        'shift_type',
        'allowed_delay',
        'allowed_delay_minutes',
        'split_time',
        'second_shift_start_time',
        'second_shift_exit_time',
        'work_times',
        'created_by',
    ];
}
