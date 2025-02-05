<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';
    protected $fillable = [
       'icon','title','title_ar','description','description_ar'
    ];
}
