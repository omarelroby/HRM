<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllowanceOption extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'insurance_active',
        'payroll_dispaly',
        'created_by',
    ];
}
