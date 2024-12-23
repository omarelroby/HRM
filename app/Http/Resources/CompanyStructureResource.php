<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyStructureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
        return [
            'name'        => implode(",",$this->employees->pluck('name')->toArray()),
            'title'       => $this['name'.$lang],
            'children'    => CompanyStructureResource::collection($this->children),
        ];
    }
}
