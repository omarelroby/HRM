<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $table = 'why_us';
    protected $fillable = [
       'title','title_ar'
    ];
}
