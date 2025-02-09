<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EndService extends Model
{

    public $table = 'end_service';
    protected $fillable = [
        'employee_id',
        'work_start_date',
        'years',
        'months',
        'days',
        'period_by_day',
        'amount',
        'date_gerg',
        'date_hijri',
        'type',
        ];
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}

