<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HolidayResource extends JsonResource
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
            'date'            => $this['date'],
            'Activity_type'   => 'Attendance',
            'activity_status' => 'holiday',
            'title'           => $this->occasion,
            'clock_in'        => "00:00:00",
            'clock_out'       => "00:00:00",
        ];
    }

}
