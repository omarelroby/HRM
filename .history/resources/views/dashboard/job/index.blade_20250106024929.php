@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
<div class="row">
    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
        @can('Create Employee')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> {{ __('Create Trainer') }}
            </a>
        @endcan
    </div>
    <!-- Trainer List Card -->
      <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-header  text-white">
                <h5 class="card-title mb-0">{{ __('Trainer List') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>{{__('Branch')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Start Date')}}</th>
                                <th>{{__('End Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Created At')}}</th>
                                @if( Gate::check('Edit Job') ||Gate::check('Delete Job') ||Gate::check('Show Job'))
                                     <th width="3%">{{ __('Action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ !empty($job->branches)?$job->branches->name:__('All') }}</td>
                                    <td>{{$job->title}}</td>
                                    <td>{{\Auth::user()->dateFormat($job->start_date)}}</td>
                                    <td>{{\Auth::user()->dateFormat($job->end_date)}}</td>
                                    <td>
                                        @if($job->status=='active')
                                            <span class="badge badge-success">{{App\Models\Job::$status[$job->status]}}</span>
                                        @else
                                            <span class="badge badge-danger">{{App\Models\Job::$status[$job->status]}}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Auth::user()->dateFormat($job->created_at) }}</td>
                                    @if( Gate::check('Edit Job') ||Gate::check('Delete Job') || Gate::check('Show Job'))
                                        <td>
                                            @if($job->status!='in_active')
                                                <a href="{{ route('job.requirement',[$job->code,!empty($job)?$job->createdBy->lang:'en']) }}" class="edit-icon btn btn-success bg-info copy_link" data-toggle="tooltip" data-original-title="{{__('Click to copy')}}"><i class="fa fa-link"></i></a>
                                            @endif
                                            @can('Show Job')
                                                <a href="{{ route('job.show',$job->id) }}" data-title="{{__('Job Detail')}}" class="edit-icon btn btn-success bg-success" data-toggle="tooltip" data-original-title="{{__('View Detail')}}"><i class="fa fa-eye"></i></a>
                                            @endcan
                                            @can('Edit Job')
                                                <a href="{{ route('job.edit',$job->id) }}" data-title="{{__('Edit Job')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('Delete Job')
                                                <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$job->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job->id],'id'=>'delete-form-'.$job->id]) !!}
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

 <!-- Add Trainer Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Trainer') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{Form::open(array('url'=>'training','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('branch',__('Branch'),['class'=>'form-control-label'])}}
                            {{Form::select('branch',$branches,null,array('class'=>'form-control select2','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('trainer_option',__('Trainer Option'),['class'=>'form-control-label'])}}
                            {{Form::select('trainer_option',$options,null,array('class'=>'form-control select2','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('training_type',__('Training Type'),['class'=>'form-control-label'])}}
                            {{Form::select('training_type',$trainingTypes,null,array('class'=>'form-control select2','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('trainer',__('Trainer'),['class'=>'form-control-label'])}}
                            {{Form::select('trainer',$trainers,null,array('class'=>'form-control select2','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('training_cost',__('Training Cost'),['class'=>'form-control-label'])}}
                            {{Form::number('training_cost',null,array('class'=>'form-control','step'=>'0.01','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('employee',__('Employee'),['class'=>'form-control-label'])}}
                            {{Form::select('employee',$employees,null,array('class'=>'form-control select2','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('start_date',__('Start Date'),['class'=>'form-control-label'])}}
                            {{Form::text('start_date',null,array('class'=>'form-control datepicker'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('end_date',__('End Date'),['class'=>'form-control-label'])}}
                            {{Form::text('end_date',null,array('class'=>'form-control datepicker'))}}
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
                        {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Description')))}}
                    </div>
                    <div class="form-group col-lg-12">
                         {{Form::label('description_ar',__('Description_ar'),['class'=>'form-control-label'])}}
                         {{Form::textarea('description_ar',null,array('class'=>'form-control','placeholder'=>__('Description_ar')))}}
                    </div>
                    <div class="col-12">
                        <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                        <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                    </div>
                </div>
                {{Form::close()}}

                <script>
                    $(function () {
                        $(".gregorian-date , .datepicker").hijriDatePicker({
                        format:'YYYY-M-D',
                        showSwitcher: false,
                        hijri:false,
                        useCurrent: true,
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
