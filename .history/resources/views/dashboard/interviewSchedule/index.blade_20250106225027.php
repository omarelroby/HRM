@extends('dashboard.layouts.master')

@section('page-title')
    {{__('Manage Interview Schedule')}}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">
@endpush


@section('content')
    <div class="row">
        <div class="all-button-box row d-flex justify-content-end">
            @can('Create Interview Schedule')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-url="{{ route('interview-schedule.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Interview Schedule')}}">
                        <i class="fa fa-plus"></i> {{__('Create')}}
                    </a>
                </div>
            @endcan
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="page-title">
                            <div class="row justify-content-between align-items-center full-calender">
                                <div class="col d-flex align-items-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                    <h5 class="fullcalendar-title h4 d-inline-block font-weight-400 mb-0"></h5>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="month">{{__('Month')}}</a>
                                        <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicWeek">{{__('Week')}}</a>
                                        <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicDay">{{__('Day')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="overflow-hidden widget-calendar">
                            <div class="calendar e-height" data-toggle="schedule_calendar" id="schedule_calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">{{__('Schedule List')}}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-wrapper p-3 schedule-box">
                    @foreach ($schedules as $schedule)
                        <div class="card mb-3 border shadow-none">
                            <div class="px-3 py-3">
                                <div class="row align-items-center">
                                    <div class="col ml-n2">
                                        <h5 class="text-sm mb-0">
                                            <a href="#!">{{!empty($schedule->applications) ? !empty($schedule->applications->jobs) ? $schedule->applications->jobs->title : '' : ''}}</a>
                                        </h5>
                                        <p class="card-text small text-muted mt-2">
                                            {{ !empty($schedule->applications)?$schedule->applications->name:'' }}
                                        </p>
                                        <p class="card-text small text-muted">
                                            {{  \Auth::user()->dateFormat($schedule->date).' '. \Auth::user()->timeFormat($schedule->time) }}
                                        </p>
                                    </div>
                                    <div class="col-auto text-right">
                                        @can('Edit Interview Schedule')
                                            <a href="#" data-url="{{ route('interview-schedule.edit',$schedule->id) }}" data-title="{{__('Edit Interview Schedule')}}" data-ajax-popup="true" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('Delete Interview Schedule')
                                            <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$schedule->id}}').submit();"><i class="fa fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['interview-schedule.destroy', $schedule->id],'id'=>'delete-form-'.$schedule->id]) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

