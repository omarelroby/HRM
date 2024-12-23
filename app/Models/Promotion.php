<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'employee_id',
        'designation_id',
        'promotion_title',
        'promotion_date',
        'description',
        'promotion_title_ar',
        'description_ar',
        'created_by',
    ];

    public function designation()
    {
        return $this->hasMany('App\Models\Designation', 'id', 'designation_id')->first();
    }

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id')->first();
    }
}
