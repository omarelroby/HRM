@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Goal Tracking')}}
@endsection
@push('css-page')
    <style>
        @import url({{ asset('css/font-awesome.css') }});
    </style>
@endpush
@section('scripts')
    <script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
            $("fieldset[id^='demo'] .stars").click(function () {
                alert($(this).val());
                $(this).attr("checked");
            });
        });

    </script>
@endsection
@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Goal Tracking')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('goaltracking.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Goal Tracking')}}">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5></h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>{{__('Goal Type')}}</th>
                                    <th>{{__('Subject')}}</th>
                                    <th>{{__('Branch')}}</th>
                                    <th>{{__('Target Achievement')}}</th>
                                    <th>{{__('Start Date')}}</th>
                                    <th>{{__('End Date')}}</th>
                                    <th>{{__('Rating')}}</th>
                                    <th width="20%">{{__('Progress')}}</th>
                                    @if(Gate::check('Edit Goal Tracking') || Gate::check('Delete Goal Tracking'))
                                        <th width="3%">{{__('Action')}}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($goalTrackings as $goalTracking)
                                    <tr>
                                        <td>{{ !empty($goalTracking->goalType)?$goalTracking->goalType->name:'' }}</td>
                                        <td>{{$goalTracking->subject}}</td>
                                        <td>{{ !empty($goalTracking->branches)?$goalTracking->branches->name:'' }}</td>
                                        <td>{{$goalTracking->target_achievement}}</td>
                                        <td>{{\Auth::user()->dateFormat($goalTracking->start_date)}}</td>
                                        <td>{{\Auth::user()->dateFormat($goalTracking->end_date)}}</td>
                                        <td>
                                            @for($i=1; $i<=5; $i++)
                                                @if($goalTracking->rating < $i)
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="text-warning fa fa-star"></i>
                                                @endif
                                            @endfor
                                        </td>
                                        <td>
                                            <div class="progress-wrapper">
                                                <span class="progress-percentage"><small class="font-weight-bold"></small>{{$goalTracking->progress}}%</span>
                                                <div class="progress progress-xs mt-2 w-100">
                                                    <div class="progress-bar bg-{{Utility::getProgressColor($goalTracking->progress)}}" role="progressbar" aria-valuenow="{{$goalTracking->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$goalTracking->progress}}%;"></div>
                                                </div>
                                            </div>

                                        </td class="text-right action-btns">
                                        @if( Gate::check('Edit Goal Tracking') ||Gate::check('Delete Goal Tracking'))
                                            <td class="text-right action-btns">
                                                @can('Edit Goal Tracking')
                                                    <a href="#" data-url="{{ route('goaltracking.edit',$goalTracking->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Goal Tracking')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Goal Tracking')
                                                    <a href="#" class="delete-icon btn btn-danger" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm-yes="document.getElementById('delete-form-{{$goalTracking->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['goaltracking.destroy', $goalTracking->id],'id'=>'delete-form-'.$goalTracking->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



