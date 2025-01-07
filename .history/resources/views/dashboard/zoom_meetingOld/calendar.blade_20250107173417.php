@extends('layouts.admin')

@section('page-title')
    {{__('Zoom Meetings Calender')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">

    	<div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12">
            <div class="all-button-box">
                <a href="{{ route('zoom-meeting.index') }}" class="btn btn-primary btn-icon-only width-auto"><i class="fa fa-list"></i> {{__('List View')}} </a>
            </div>
        </div>

        @if (\Auth::user()->type == 'company')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('zoom-meeting.create') }}" data-ajax-popup="true" data-title="{{__('Create Zoom Meeting')}}" class="btn btn-primary btn-icon-only width-auto">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endif
    </div>
@endsection

@push('head')
<link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')}}">
@endpush

@push('script-page')
	
@endsection
