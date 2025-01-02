@extends('layouts.admin')

@section('page-title')
    {{__('Manage Holiday')}}
@endsection

@section('action-button')

    <div class="all-button-box row d-flex justify-content-end mt-2">
        @can('Create Holiday')
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="all-button-box">
            <a href="#" data-url="{{ route('holiday.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Holiday')}}">
                <i class="fa fa-plus"></i> {{__('Create')}}
            </a>
            </div>
        </div>
        @endcan
        
        <div class="col-auto">
            <div class="all-button-box">
            <a href="{{ route('holiday.calender') }}" class="action-btn btn btn-info mt-4" data-toggle="tooltip" data-original-title="{{__('Calender View')}}">
                <i class="fa fa-calendar"></i>
            </a>
            </div>
        </div>
    </div>
   
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(array('route' => array('holiday.index'),'method'=>'get','id'=>'holiday_filter')) }}
            <div class="row d-flex justify-content-end mt-2">

                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="all-select-box">
                        <div class="btn-box">
                            {{Form::label('start_date',__('Start Date'),['class'=>'text-type'])}}
                            {{Form::text('start_date',isset($_GET['start_date'])?$_GET['start_date']:'',array('class'=>'month-btn form-control gregorian-date'))}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                    <div class="all-select-box">
                        <div class="btn-box">
                            {{Form::label('end_date',__('End Date'),['class'=>'text-type'])}}
                            {{Form::text('end_date',isset($_GET['end_date'])?$_GET['end_date']:'',array('class'=>'month-btn form-control gregorian-date'))}}
                        </div>
                    </div>
                </div>
                <div class="col-auto mt-auto mb-3">
                    <a href="#" class="apply-btn btn btn-primary mt-4" onclick="document.getElementById('holiday_filter').submit(); return false;" data-toggle="tooltip" data-original-title="{{__('apply')}}">
                        <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                    </a>
                    <a href="{{route('holiday.index')}}" class="reset-btn btn btn-danger mt-4" data-toggle="tooltip" data-original-title="{{__('Reset')}}">
                        <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                    </a>

                </div>
            </div>
            {{ Form::close() }}


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
                                            <th>{{__('Date')}}</th>
                                            <th>{{__('Occasion')}}</th>
                                            @if(Gate::check('Edit Holiday') || Gate::check('Delete Holiday'))
                                                <th width="3%">{{__('Action')}}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody class="font-style">
                                        @foreach ($holidays as $holiday)
                                            <tr>
                                                <td>{{ \Auth::user()->dateFormat($holiday->date) }}</td>
                                                <td>{{ $holiday->occasion }}</td>
                                                @if(Gate::check('Edit Holiday') || Gate::check('Delete Holiday'))
                                                    <td class="text-right action-btns">
                                                        <span>
                                                        @can('Edit Holiday')
                                                                <a href="#" class="edit-icon btn btn-success" data-url="{{ route('holiday.edit',$holiday->id) }}" data-ajax-popup="true" data-title="{{__('Edit Holiday')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @endcan
                                                            @can('Delete Holiday')
                                                                <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$holiday->id}}').submit();">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['holiday.destroy', $holiday->id],'id'=>'delete-form-'.$holiday->id]) !!}
                                                                {!! Form::close() !!}
                                                            @endcan
                                                        </span>
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

        </div>
    </div>

@endsection

