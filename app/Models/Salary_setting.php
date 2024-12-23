<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary_setting extends Model
{
    protected $fillable = [
        'saudi_company_insurance_percentage',
        'saudi_employee_insurance_percentage',
        'Nonsaudi_company_insurance_percentage',
        'Nonsaudi_employee_insurance_percentage',
        'saudi_employee_medical_insurance',
        'Nonsaudi_employee_medical_insurance',
        'saudi_company_medical_insurance',
        'Nonsaudi_company_medical_insurance',
        'work_days',
        'work_hours',
        'annual_vacations',
        'week_vacations',
        'sick_absence_discount',
        'absence_with_permission_discount',
        'absence_without_permission_discount',
        'overtime_rate',
        'created_by'
    ];
}
