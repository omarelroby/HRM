<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TerminationType extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'created_by',
    ];
}
