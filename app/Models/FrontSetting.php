<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrontSetting extends Model
{
    protected $table = 'front_setting';
    protected $fillable = [
       'address','email','twitter','instagram','facebook','linkedin','phone'
    ];
}
