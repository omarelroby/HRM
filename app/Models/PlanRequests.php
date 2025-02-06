<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanRequests extends Model
{
    protected $table = 'plan_request';
    protected $fillable = [
        'name',
        'plan_id',
        'phone',
        'email',
        'buisness_type',
    ];


    public function Plan()
    {
        return $this->belongsTo(Plan::class , 'plan_id');
    }
}
