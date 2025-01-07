@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection
@section('css')
<style>
    .select2-container--default.select2-container--focus .select2-selection--multiple,
    .select2-container--default .select2-selection--multiple {
        height: auto !important;
        min-height: 40px !important;
    }
</style>    
@endsection

@section('content')
<div class="row">

    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
        @can('Create Zoom Meeting')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> {{ __('Create Zoom Meeting') }}
            </a>
        @endcan
    </div>
    <!-- Job List Card -->
    <div class="col-lg-12">
        <div class="row">

        </div>
        <div class="card shadow-sm">

            <div class="card-header text-white">
                <h5 class="card-title mb-0">{{ __('Zoom Meeting List') }}</h5>
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
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Meeting Time') }}</th>
                                <th>{{ __('Duration') }}</th>
                                <th>{{ __('User') }}</th>
                                <th>{{ __('Join URL') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th class="text-right" width="3%"> {{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ZoomMeetings as $ZoomMeeting)
                                <tr>
                                    <td>{{ $ZoomMeeting->title }}</td>
                                    <td>{{ $ZoomMeeting->start_date }}</td>
                                    <td>{{ $ZoomMeeting->duration }} {{ __(' Minute') }}</td>

                                    <td>
                                        <div class="avatar-group">
                                            @foreach ($ZoomMeeting->users($ZoomMeeting->user_id) as $projectUser)
                                                <a href="#" class="avatar rounded-circle avatar-sm avatar-group">
                                                    <img alt="" @if (!empty($users->avatar)) src="{{ $profile . '/' . $projectUser->avatar }}" @else  avatar="{{ !empty($projectUser) ? $projectUser->name : '' }}" @endif
                                                        data-original-title="{{ !empty($projectUser) ? $projectUser->name : '' }}"
                                                        data-toggle="tooltip"
                                                        data-original-title="{{ !empty($projectUser) ? $projectUser->name : '' }}"
                                                        class="">
                                                </a>
                                            @endforeach
                                        </div>
                                    </td>

                                    <td>
                                        @if ($ZoomMeeting->created_by == \Auth::user()->id && $ZoomMeeting->checkDateTime())
                                            <a href="{{ $ZoomMeeting->start_url }}" target="_blank"> {{ __('Start meeting') }} <i
                                                    class="fa fa-external-link-square-alt "></i></a>
                                        @elseif($ZoomMeeting->checkDateTime())
                                            <a href="{{ $ZoomMeeting->join_url }}" target="_blank"> {{ __('Join meeting') }} <i
                                                    class="fa fa-external-link-square-alt "></i></a>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if ($ZoomMeeting->checkDateTime())
                                            @if ($ZoomMeeting->status == 'waiting')
                                                <span class="badge badge-info">{{ ucfirst($ZoomMeeting->status) }}</span>
                                            @else
                                                <span class="badge badge-success">{{ ucfirst($ZoomMeeting->status) }}</span>
                                            @endif
                                        @else
                                            <span class="badge badge-danger">{{ __('End') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="actions ml-3 rtl-actions">
                                            {{-- <a href="#" data-ajax-popup="true" data-title="{{__('Edit Zoom Meeting')}}" data-size="lg"
                                        data-url="{{route('zoom-meeting.edit', $ZoomMeeting->id)}}"
                                        class="action-item mr-2 "><i class="fa fa-edit" data-toggle="tooltip" title="{{__('Edit Zoom Meeting')}}"></i></a> --}}

                                            <a href="#" class="action-item text-danger mr-2 emp_delete delete-icon" data-toggle="tooltip"
                                                data-original-title="{{ __('Delete') }}"
                                                data-confirm="{{ __('Are You Sure?') }}|{{ __('This action can not be undone. Do you want to continue?') }}"
                                                data-confirm-yes="document.getElementById('delete-form-{{ $ZoomMeeting->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['zoom-meeting.destroy', $ZoomMeeting->id], 'id' => 'delete-form-' . $ZoomMeeting->id]) !!}
                                            {!! Form::close() !!}
                                            <span class="clearfix"></span>
                                        </div>
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

<!-- Add Meeting Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Meeting') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">


                    {{ Form::open(['url' => 'zoom-meeting', 'enctype' => 'multipart/form-data',"autocomplete"  => "off"]) }}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {{ Form::label('', __('Title'), ['class' => 'form-control-label']) }}
                                {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Meeting Title'), 'required' => 'required']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group select2_option">
                                {{ Form::label('', __('User'), ['class' => 'form-control-label']) }}
                                {!! Form::select('user_id[]', $employee_option, null, ['multiple' => true, 'class' => 'form-control select2']) !!}
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                {{ Form::label('', __('Start Date'), ['class' => 'form-control-label']) }}
                                {!! Form::text('start_date', null, ['class' => 'form-control datepicker datetime_class_start_date']) !!}
                                <input type="hidden" name="start_date" class="start_date" value="">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                {{ Form::label('', __('Duration'), ['class' => 'form-control-label']) }}
                                {!! Form::number('duration', null, ['class' => 'form-control', 'required' => true, 'min' => 0]) !!}
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                {{ Form::label('password', __('Password'),['class' => 'form-control-label']) }}
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Password')]) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                        </div>
                    </div>
                    {{ Form::close() }}

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

<!-- Script for Date Picker -->
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

@section('script')
<script>

    $(document).ready(function () {
        var b_id = $('#branch_id').val();
        getDepartment(b_id);
    });
    $(document).on('change', 'select[name=branch_id]', function () {

        var branch_id = $(this).val();
        getDepartment(branch_id);
    });

    function getDepartment(bid) {

        $.ajax({
            url: '{{route('meeting.getdepartment')}}',
            type: 'POST',
            data: {
                "branch_id": bid, "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                console.log(data);
                $('#department_id').empty();
                $('#department_id').append('<option value="">{{__('Select Department')}}</option>');

                $('#department_id').append('<option value="0"> {{__('All Department')}} </option>');
                $.each(data, function (key, value) {
                    $('#department_id').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    }

    $(document).on('change', '#department_id', function () {
        var department_id = $(this).val();
        getEmployee(department_id);
    });

    function getEmployee(did) {

        $.ajax({
            url: '{{route('meeting.getemployee')}}',
            type: 'POST',
            data: {
                "department_id": did, "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                console.log(data);
                $('#employee_id').empty();
                $('#employee_id').append('<option value="">{{__('Select Employee')}}</option>');
                $('#employee_id').append('<option value="0"> {{__('All Employee')}} </option>');

                $.each(data, function (key, value) {
                    $('#employee_id').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    }
</script>
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
