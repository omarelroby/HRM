<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    protected $table = 'request_types';

    protected $fillable = [
        'name','name_ar','created_by'
    ];
}
