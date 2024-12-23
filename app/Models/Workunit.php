<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workunit extends Model
{
    protected $table = 'work_unites';

    protected $fillable = [
        'name','name_ar','created_by'
    ];
}
