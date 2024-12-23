<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'id'                  => $this['id'],
            'title'               => $this['title'],
            'title_ar'            => $this['title_ar'],
            'end_date'            => $this['end_date'],
            'description'         => $this['description'],
            'description_ar'      => $this['description_ar'],
            'priority'            => $this['priority'],
            'ticket_code'         => $this['ticket_code'],
            'repliesCount'        => $this->ticketUnread(),
            'replies'             => TicketReplyResource::collection($this->ticketReplies()),
        ];
    }
}
