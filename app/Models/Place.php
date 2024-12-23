<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
       'name','name_ar','lat','lon','created_by'
    ];
}
