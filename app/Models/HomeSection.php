<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $table = 'home_section';
    protected $fillable = [
       'title','description','image','title_ar','description_ar'
    ];
}
