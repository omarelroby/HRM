<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'title_ar',
        'employee_id',
        'priority',
        'end_date',
        'description',
        'description_ar',
        'ticket_code',
        'created_by',
        'ticket_created',
        'status',
    ];

    public function ticketUnread()
    {
        if(\Auth::user()->type == 'employee')
        {
            return TicketReply:: where('ticket_id', $this->id)->where('is_read', 0)->where('created_by', \Auth::user()->id)->count('id');
        }
        else
        {
            return TicketReply:: where('ticket_id', $this->id)->where('is_read', 0)->where('created_by', '!=', \Auth::user()->creatorId())->count('id');
        }
    }

    public function ticketReplies()
    {
        if(\Auth::user()->type == 'employee')
        {
            return TicketReply:: where('ticket_id', $this->id)->where('is_read', 0)->where('created_by', \Auth::user()->id)->get(['description','created_at']);
        }
        else
        {
            return TicketReply:: where('ticket_id', $this->id)->where('is_read', 0)->where('created_by', '!=', \Auth::user()->creatorId())->get(['description','created_at']);
        }
    }

    public function createdBy()
    {
        return $this->hasOne('App\Models\user', 'id', 'ticket_created');
    }
}
