<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobtype extends Model
{
    protected $table = 'job_types';

    protected $fillable = [
        'name','name_ar','created_by'
    ];
}
