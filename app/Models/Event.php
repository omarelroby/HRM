<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'employee_id',
        'title',
        'title_ar',
        'start_date',
        'end_date',
        'color',
        'description',
        'description_ar',
        'created_by',
    ];
}
