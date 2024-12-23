<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'work_days_count'           => $this->workdays($this->id),
            'delay_duration_sum'        => $this->sumDateWithSecondes() ?? 0,
            'vacation_days_count'       => 0,
            'absent_days_count'         => $this->absenceCount()->count(),
            'permission_requests_count' => 0,
            'reports_count'             => 0,
        ];
    }
}
