<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeContracts extends Model
{
    protected $fillable = [
        'employee_id','contract_type','contract_duration','contract_startdate',
        'contract_startdate_hijri','contract_enddate'
        ,'contract_enddate_hijri','contract_document',
        'medical_insurance','insurance_startdate','insurance_enddate','insurance_document','worker',
        'worker_startdate','worker_enddate','worker_document','residence_number','residence_expiredate',
        'passport_number','passport_expiredate','created_by'
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }
    
}
