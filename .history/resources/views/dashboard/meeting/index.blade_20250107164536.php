@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
<div class="row">

    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
        @can('Create Custom Question')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> {{ __('Create Custom Question') }}
            </a>
        @endcan
    </div>
    <!-- Job List Card -->
    <div class="col-lg-12">
        <div class="row">

        </div>
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
                                <th>{{__('Meeting title')}}</th>
                                <th>{{__('Meeting Date')}}</th>
                                <th>{{__('Meeting Time')}}</th>
                                @if(Gate::check('Edit Meeting') || Gate::check('Delete Meeting'))
                                    <th width="3%">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="font-style">
                            @foreach ($meetings as $meeting)
                                <tr>

                                    <td>{{ $meeting->title }}</td>
                                    <td>{{  \Auth::user()->dateFormat($meeting->date) }}</td>
                                    <td>{{  \Auth::user()->timeFormat($meeting->time) }}</td>
                                    @if(Gate::check('Edit Meeting') || Gate::check('Delete Meeting'))
                                    <td class="text-right action-btns">
                                        {{-- Edit Button --}}
                                        @can('Edit Meeting')
                                            <a href="#"
                                               data-url="{{ URL::to('meeting/'.$meeting->id.'/edit') }}"
                                               data-size="lg"
                                               data-ajax-popup="true"
                                               data-title="{{ __('Edit Meeting') }}"
                                               class="edit-icon btn btn-success"
                                               data-toggle="tooltip"
                                               data-original-title="{{ __('Edit') }}">
                                               <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan

                                        {{-- Delete Button --}}
                                        @can('Delete Meeting')
                                            <a href="#"
                                               class="delete-icon btn btn-danger"
                                               data-toggle="tooltip"
                                               data-original-title="{{ __('Delete') }}"
                                               data-confirm="{{ __('Are You Sure?') . '|' . __('This action cannot be undone. Do you want to continue?') }}"
                                               data-confirm-yes="document.getElementById('delete-form-{{ $meeting->id }}').submit();">
                                               <i class="fa fa-trash"></i>
                                            </a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['meeting.destroy', $meeting->id],
                                                'id' => 'delete-form-' . $meeting->id
                                            ]) !!}
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

<!-- Add Job Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                {{Form::open(array('url'=>'meeting','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('branch_id',__('Branch'),['class'=>'form-control-label'])}}
                            <select class="form-control select2" name="branch_id" id="branch_id" placeholder="Select Branch">
                                <option value="">{{__('Select Branch')}}</option>
                                <option value="0">{{__('All Branch')}}</option>
                                @foreach($branch as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('department_id',__('Department'),['class'=>'form-control-label'])}}
                            <select class="form-control select2" name="department_id[]" id="department_id" placeholder="Select Department" multiple>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('employee_id',__('Employee'),['class'=>'form-control-label'])}}
                            <select class="form-control select2" name="employee_id[]" id="employee_id" placeholder="Select Employee" multiple>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title',__('Meeting Title'),['class'=>'form-control-label'])}}
                            {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Meeting Title')))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('date',__('Meeting Date'),['class'=>'form-control-label'])}}
                            {{Form::text('date',null,array('class'=>'form-control datepicker'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('time',__('Meeting Time'),['class'=>'form-control-label'])}}
                            {{Form::text('time',null,array('class'=>'form-control timepicker'))}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('note',__('Meeting Note'),['class'=>'form-control-label'])}}
                            {{Form::textarea('note',null,array('class'=>'form-control','placeholder'=>__('Enter Meeting Note')))}}
                        </div>
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
<script>

    $(function () {
        $(".gregorian-date, .datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true,
        });
    });
</script>
@endsection
