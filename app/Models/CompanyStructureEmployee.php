<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyStructureEmployee extends Model
{
    protected $table = 'company_structure_employees';
    protected $fillable = [
        'structure_id',
        'employee_id',
        'created_by',
    ];

}
