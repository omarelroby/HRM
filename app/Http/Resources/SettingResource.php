<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'company_name'           => $this['company_name'],
            'company_address'        => $this['company_address'],
            'company_city'           => $this['company_city'],
            'company_state'          => $this['company_state'],
            'company_zipcode'        => $this['company_zipcode'],
            'company_country'        => $this['company_country'],
            "phone"                  => $this['company_telephone'],
            "email"                  => $this['company_email'],
            "start_time"             => $this['company_start_time'],
            "end_time"               => $this['company_end_time'],
            "grace_period"           => $this['company_grace_period'],
            "grace_period_before"    => $this['company_grace_period_befor'],
        ];
    }
}
