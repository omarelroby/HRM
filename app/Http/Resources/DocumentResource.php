<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class DocumentResource extends JsonResource
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
            'id'                 => $this['id'],
            'name'               => $this['name'],
            'document'           => asset(Storage::url('uploads/documentUpload/'.$this['document'])),
            'description'        => $this['description'],
        ];
    }
}
