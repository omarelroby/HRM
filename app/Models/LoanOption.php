<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanOption extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'created_by',
    ];
}
