<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'employee_id',
        'type',
        'title',
        'body',
        'read',
        'created_by',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id');
    }
}
