<?php

namespace App\Http\Resources;

use App\Models\Attendance;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {    
        return [
            'name' => $this->name,
            'type' => $this->type,
            'profile' => $this->avatar ? asset('storage/uploads/'.$this->avatar) : asset('storage/uploads/default_image.jpeg'),
            'email' => $this->email,
            'can_click_start_work' => true,
            'can_click_end_work' => true,
            'can_start_client_visit' =>  false,
            'can_start_meeting' => false,
            'can_end_client_visit' => false,
            'should_captured_photo' => false,
        ];
    }
}
