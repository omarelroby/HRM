<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name',
        'name_ar',
        'is_start_end_date',
        'employee_id',
        'created_by',
        'start_date',
        'end_date',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
    public function document_type()
    {
        return $this->belongsTo(DocumentType::class,'document_type_id');
    }
}
