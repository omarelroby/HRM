<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    protected $table = 'order_requests';
    protected $fillable = [
        'start_date',
        'end_date',
        'payment',
        'plan_id',
        'phone',
        'email',
        'name',
    ];
    public function plan()
    {
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
}
