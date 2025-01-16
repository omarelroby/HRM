<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    protected $table = 'sub_department';
    protected $fillable = [
        'department_id',
        'name',
        'name_ar',
        'created_by',
    ];
    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function employeess()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
