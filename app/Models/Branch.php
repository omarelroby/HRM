<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
       'employee_id','name','name_ar','lat','lon','created_by'
    ];

    public function employees()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }

    public function employeess()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
