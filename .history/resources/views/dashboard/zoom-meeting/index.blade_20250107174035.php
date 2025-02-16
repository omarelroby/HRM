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

        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12">
            <div class="all-button-box">
                <a href="{{ route('zoom_meeting.calender') }}" class="btn btn-primary btn-icon-only width-auto"><i
                        class="far fa-calendar-alt"></i> {{ __('Calendar View') }} </a>
            </div>
        </div>

        @if (\Auth::user()->type == 'company')
            <a href="#"  data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary"
                data-title="{{ __('Create New Zoom Meeting') }}" class="btn btn-primary btn-icon-only width-auto">
                <i class="fa fa-plus"></i> {{ __('Create') }}
            </a>
        @endif
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
                                            {{-- Edit Button (Commented Out) --}}
                                            {{-- <a href="#" data-ajax-popup="true" data-title="{{__('Edit Zoom Meeting')}}" data-size="lg"
                                                data-url="{{route('zoom-meeting.edit', $ZoomMeeting->id)}}"
                                                class="action-item mr-2">
                                                <i class="fa fa-edit" data-toggle="tooltip" title="{{__('Edit Zoom Meeting')}}"></i>
                                            </a> --}}

                                            {{-- Delete Button --}}


 
                                            <form method="POST" action="{{ route('zoom-meeting.destroy', $ZoomMeeting->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

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

<!-- Add Zoom Meeting Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header  text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Zoom Meeting') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{ Form::open(['url' => 'zoom-meeting', 'method' => 'post', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off', 'class' => 'needs-validation', 'novalidate' => true]) }}
                <div class="row g-3">
                    <!-- Meeting Title -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title', __('Title'), ['class' => 'form-label']) }}
                            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Meeting Title'), 'required' => true]) }}
                            <div class="invalid-feedback">
                                {{ __('Please enter a meeting title.') }}
                            </div>
                        </div>
                    </div>

                    <!-- User Selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('user_id', __('User'), ['class' => 'form-label']) }}
                            {!! Form::select('user_id[]', $employee_option, null, ['multiple' => true, 'class' => 'form-control select2', 'required' => true]) !!}
                            <div class="invalid-feedback">
                                {{ __('Please select at least one user.') }}
                            </div>
                        </div>
                    </div>

                    <!-- Start Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('start_date', __('Start Date'), ['class' => 'form-label']) }}
                            {!! Form::text('start_date', null, ['class' => 'form-control datepicker datetime_class_start_date', 'required' => true]) !!}
                            <input type="hidden" name="start_date" class="start_date" value="">
                            <div class="invalid-feedback">
                                {{ __('Please select a start date.') }}
                            </div>
                        </div>
                    </div>

                    <!-- Duration -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('duration', __('Duration (in minutes)'), ['class' => 'form-label']) }}
                            {!! Form::number('duration', null, ['class' => 'form-control', 'required' => true, 'min' => 0, 'placeholder' => __('Enter Duration')]) !!}
                            <div class="invalid-feedback">
                                {{ __('Please enter a valid duration.') }}
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('password', __('Password'), ['class' => 'form-label']) }}
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Password')]) }}
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
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
<script>
    function ddatetime_range() {
        $('.datetime_class_start_date').daterangepicker({
            "singleDatePicker": true,
            "timePicker": true,
            "autoApply": false,
            "locale": {
                "format": 'YYYY-MM-DD H:mm'
            },
            "timePicker24Hour": true,
        }, function(start, end, label) {
            $('.start_date').val(start.format('YYYY-MM-DD H:mm'));
        });
    }
</script>
@endsection
