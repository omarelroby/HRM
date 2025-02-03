<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeRequest extends Model
{
    protected $table = 'employee_requests';

    protected $fillable = [
        'employee_id',
        'request_type_id',
        'applied_on',
        'start_date',
        'end_date',
        'request_reason',
        'request_reason_ar',
        'status',
        'created_by',
        'reject_reason',
        'sub_request_type_id',
    ];

    public function requestType()
    {
        return $this->hasOne('App\Models\RequestType', 'id', 'request_type_id');
    }

    public function employees()
    {
        return $this->belongsTo('App\Models\Employee',   'employee_id');
    }
}
