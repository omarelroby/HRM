<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyEmailTemplate extends Model
{
    protected $table = 'company_email_template';
    protected $fillable = [
       'subject','message_ar','message'
    ];
}
