<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'complaint_from',
        'complaint_against',
        'title',
        'title_ar',
        'complaint_date',
        'description',
        'description_ar',
        'created_by',
    ];


    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id')->first();
    }

    public function complaintFrom($complaint_from)
    {
        return Employee::where('id',$complaint_from)->first();
    }
    public function complaintAgainst($complaint_against)
    {
        return Employee::where('id',$complaint_against)->first();
    }
}
