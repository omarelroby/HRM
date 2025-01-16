<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section';
    protected $fillable = [
        'sub_dep_id',
        'name',
        'name_ar',
        'created_by',
    ];
    public function sub_dep(){
        return $this->belongsTo(SubDepartment::class, 'sub_dep_id');
    }
    public function employeess()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
