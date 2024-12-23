<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDucumentUpload extends Model
{
    protected $fillable = [
        'name',
        'document',
        'description',
        'created_by',
    ];
    
}
