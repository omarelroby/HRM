<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyStructure extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'parent',
        'created_by',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent', 'id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class,'company_structure_employees','structure_id');
    }

}
