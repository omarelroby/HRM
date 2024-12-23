<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'employee_id',
        'loan_option',
        'title',
        'amount',
        'discount_monthly',
        'start_date',
        'end_date',
        'reason',
        'created_by',
    ];

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id')->first();
    }

    public function loan_option()
    {
        return $this->hasOne('App\Models\LoanOption', 'id', 'loan_option')->first();
    }
}
