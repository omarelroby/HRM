@extends('dashboard.layouts.master')

@section('page-title')
    {{__('Ticket Reply')}}
@endsection

@section('action-button')
    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            @foreach($ticketreply as $reply)
                <div class="card">
                    <div class="card-header p-3">
                        <div class="d-flex justify-content-between w-100">
                            <h6 class="mb-0">{{!empty(\Auth::user()->getUser($reply->created_by))?\Auth::user()->getUser($reply->created_by)->name:'' }} </h6>
                            <small class="text-gray text-xs">{{$reply->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{{ $reply->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        @if($ticket->status=='open')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header p-3">
                        <div class="d-flex justify-content-between w-100">
                            <h6 class="m-0">{{__('Add Reply')}}</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        {{Form::open(array('url'=>'ticket/changereply','method'=>'post'))}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
                                    {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Ticket Reply')))}}
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
                                <input type="submit" value="{{__('Send')}}" class="btn-create badge-blue">
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

