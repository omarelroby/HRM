<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    protected $fillable = [
        'warning_to',
        'warning_by',
        'subject',
        'subject_ar',
        'warning_date',
        'description',
        'description_ar',
        'created_by',
    ];


    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id')->first();
    }

    public function warningTo($warningto)
    {
        return Employee::where('id',$warningto)->first();
    }
    public function warningBy($warningby)
    {
        return Employee::where('id',$warningby)->first();
    }
}
