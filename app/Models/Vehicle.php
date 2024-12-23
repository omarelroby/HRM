<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    protected $fillable = [
        'vehicle_type',
        'vehicle_type_ar',
        'model',
        'model_ar',
        'registration_date',
        'insurance_date',
        'check_date',
        'custody',
        'custody_ar',
        'insurance_expiry_date',
        'check_expiry_date',
        'created_by',
    ];
}
