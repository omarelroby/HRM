<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'id'             => $this['id'],
            "title"          => $this['title'],
            "start_date"     => $this['start_date'],
            "end_date"       => $this['end_date'],
            "color"          => $this['color'],
            "description"    => $this['description'],
            "description_ar" => $this['description_ar'],
            "title_ar"       => $this['title_ar'],
        ];
    }
}
