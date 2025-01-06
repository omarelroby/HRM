@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Ticket Reply') }}
@endsection

@section('content')
    <div class="row">
        <!-- Edit Button (Conditional) -->
        <div class="col-12 text-right mb-4">
            @if(\Auth::user()->type == 'company' || $ticket->ticket_created == \Auth::user()->id)
                <a href="#"
                   data-url="{{ URL::to('ticket/' . $ticket->id . '/edit') }}"
                   data-size="lg"
                   data-ajax-popup="true"
                   data-title="{{ __('Edit Ticket') }}"
                   class="btn btn-primary btn-icon-only width-auto">
                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                </a>
            @endif
        </div>

        <!-- Ticket Replies Section -->
        <div class="col-md-6">
            @foreach($ticketreply as $reply)
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-light p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                {{ \Auth::user()->getUser($reply->created_by)->name ?? '' }}
                            </h6>
                            <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $reply->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Add Reply Section (Conditional) -->
        @if($ticket->status == 'open')
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-light p-3">
                        <h6 class="mb-0">{{ __('Add Reply') }}</h6>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['url' => 'ticket/changereply', 'method' => 'post', 'class' => 'needs-validation', 'novalidate']) }}
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Enter your reply'), 'rows' => 4, 'required' => 'required']) }}
                                    <div class="invalid-feedback">{{ __('Please enter a reply.') }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">
                                <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
