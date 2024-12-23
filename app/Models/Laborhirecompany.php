<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laborhirecompany extends Model
{
    protected $table = 'labor_hire_companies';

    protected $fillable = [
        'name','name_ar','created_by'
    ];
}
