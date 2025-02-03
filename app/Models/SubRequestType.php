<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubRequestType extends Model
{
    protected $table = 'sub_request_types';

    protected $fillable = [
        'name','name_ar','created_by','request_type_id'
    ];
    public function requestType()
    {
        return $this->belongsTo('App\Models\RequestType','request_type_id');
    }
}
