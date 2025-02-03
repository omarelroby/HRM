<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacAddress extends Model
{
    protected $table = 'mac_address';
    protected $fillable = [
        'mac',
        'created_by',
    ];



}
