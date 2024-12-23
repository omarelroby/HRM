<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = [
        'date',
        'occasion',
        'occasion_ar',
        'created_by',
    ];
}
