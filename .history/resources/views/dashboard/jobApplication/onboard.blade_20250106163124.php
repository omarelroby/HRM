@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Job OnBoard')}}
@endsection


@section('content')
<div class="row">

    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
        @can('Create Interview Schedule')
        <a href="#" data-url="{{ route('job.on.board.create',0)}}" data-ajax-popup="true" class="btn btn-primary btn-icon-only width-auto" data-title="{{__('Create New Job OnBoard')}}">
            <i class="fa fa-plus"></i> {{__('Create')}}
        </a>
        @endcan
    </div>
    <div class="d-flex justify-content-end mb-3">
        @can('Create Employee')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> {{ __('Create Job') }}
            </a>
        @endcan
    </div>
    <!-- Job List Card -->
    <div class="col-lg-12">
        <div class="card shadow-sm">

            <div class="card-header text-white">
                <h5 class="card-title mb-0">{{ __('Job List') }}</h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Job')}}</th>
                                <th>{{__('Branch')}}</th>
                                <th>{{__('Applied at')}}</th>
                                <th>{{__('Joining at')}}</th>
                                <th>{{__('Status')}}</th>
                                <th width="3%">{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody class="font-style">
                            @foreach ($jobOnBoards as $job)
                                <tr>
                                    <td>{{ !empty($job->applications)?$job->applications->name:'-' }}</td>
                                    <td>{{!empty($job->applications)?!empty($job->applications->jobs)?$job->applications->jobs->title:'-':'-'}}</td>
                                    <td>{{!empty($job->applications)?!empty($job->applications->jobs)?!empty($job->applications->jobs)?!empty($job->applications->jobs->branches)?$job->applications->jobs->branches->name:'-':'-':'-':'-'}}</td>
                                    <td>{{\Auth::user()->dateFormat(!empty($job->applications)?$job->applications->created_at:'-' )}}</td>
                                    <td>{{\Auth::user()->dateFormat($job->joining_date)}}</td>
                                    <td>
                                        @if($job->status=='pending')
                                            <span class="badge badge-soft-warning">{{\App\Models\JobOnBoard::$status[$job->status]}}</span>
                                        @elseif($job->status=='cancel')
                                            <span class="badge badge-soft-danger">{{\App\models\JobOnBoard::$status[$job->status]}}</span>
                                        @else
                                            <span class="badge badge-soft-success">{{\App\models\JobOnBoard::$status[$job->status]}}</span>
                                        @endif
                                    </td>

                                    <td class="text-right action-btns">
                                        @if($job->status=='confirm' && $job->convert_to_employee==0)
                                            <a href="{{route('job.on.board.convert', $job->id)}}" class="edit-icon btn btn-success bg-info" data-toggle="tooltip" data-original-title="{{__('Convert to Employee')}}"><i class="fas fa-exchange-alt"></i></a>
                                        @elseif($job->status=='confirm' && $job->convert_to_employee!=0)
                                            <a href="{{route('employee.show', \Crypt::encrypt($job->convert_to_employee))}}" class="edit-icon btn btn-success bg-info" data-toggle="tooltip" data-original-title="{{__('Employee Detail')}}"><i class="fas fa-eye"></i></a>
                                        @endif

                                        <a href="#" data-url="{{route('job.on.board.edit', $job->id)}}" data-ajax-popup="true" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fas fa-edit"></i></a>

                                        <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$job->id}}').submit();"><i class="fas fa-trash"></i></a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['job.on.board.delete', $job->id],'id'=>'delete-form-'.$job->id]) !!}
                                        {!! Form::close() !!}

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Job Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Job') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{Form::open(array('route'=>array('job.on.board.store',$id),'method'=>'post'))}}
            <div class="row">
                @if($id==0)
                    <div class="form-group col-md-12">
                        {{Form::label('application',__('Interviewer'),['class'=>'form-control-label'])}}
                        {{Form::select('application',$applications,null,array('class'=>'form-control select2','required'=>'required'))}}
                    </div>
                @endif
                <div class="form-group col-md-12">
                    {!! Form::label('joining_date', __('Joining Date'),['class'=>'form-control-label']) !!}
                    {!! Form::text('joining_date', null, ['class' => 'form-control datepicker']) !!}
                </div>
                <div class="form-group col-md-12">
                    {{Form::label('status',__('Status'),['class'=>'form-control-label'])}}
                    {{Form::select('status',$status,null,array('class'=>'form-control select2'))}}
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

@endsection


