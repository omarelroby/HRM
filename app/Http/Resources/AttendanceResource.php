<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'Activity_type'   => 'Attendance',  // نوع النشاط
            'activity_status' => $this['delay_reason'] ? 'delay' : 'in-time',     // حالة النشاط
            'title'           => 'Attended',
            'clock_in'        => $this['clock_in'],
            'clock_out'       => $this['clock_out'],
        ];
    }

}
