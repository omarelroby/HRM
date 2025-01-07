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
                <i class="fas fa-plus"></i> {{ __('Create Meeting') }}
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

                                        {{-- Delete Button --}}

                                        @can('Edit Meeting')
                                        <a href="{{ route('meeting.edit', $meeting->id) }}"
                                            data-title="{{ __('Edit meeting') }}" data-toggle="tooltip"
                                            data-original-title="{{ __('Edit') }}" class="btn btn-success btn-icon-only">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                       @endcan

                                        {{-- Delete Button --}}
                                        @can('Delete Meeting')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['meeting.destroy', $meeting->id], 'id' => 'delete-form-' . $meeting->id, 'style' => 'display:inline;']) !!}
                                                <button type="button" class="btn btn-danger btn-icon-only" data-toggle="tooltip" data-original-title="{{ __('Delete') }}"
                                                        onclick="if (confirm('Are you sure you want to delete this item? This action cannot be undone.')) { document.getElementById('delete-form-{{ $meeting->id }}').submit(); }">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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
                {{ Form::open(['url' => 'meeting', 'method' => 'post', 'class' => 'needs-validation', 'novalidate' => true]) }}
                <div class="row g-3">
                    <!-- Branch Selection -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('branch_id', __('Branch'), ['class' => 'form-label']) }}
                            <select class="form-control select2" name="branch_id" id="branch_id" required>
                                <option value="">{{ __('Select Branch') }}</option>
                                <option value="0">{{ __('All Branches') }}</option>
                                @foreach($branch as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ __('Please select a branch.') }}
                            </div>
                        </div>
                    </div>

                    <!-- Department Selection -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('department_id', __('Department'), ['class' => 'form-label']) }}
                            <select class="form-control select2" name="department_id[]" id="department_id" multiple>
                                <!-- Departments will be dynamically populated based on the selected branch -->
                            </select>
                        </div>
                    </div>

                    <!-- Employee Selection -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('employee_id', __('Employee'), ['class' => 'form-label']) }}
                            <select class="form-control select2" name="employee_id[]" id="employee_id" multiple>
                                <!-- Employees will be dynamically populated based on the selected department -->
                            </select>
                        </div>
                    </div>

                    <!-- Meeting Title -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('title', __('Meeting Title'), ['class' => 'form-label']) }}
                            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Meeting Title'), 'required' => true]) }}
                            <div class="invalid-feedback">
                                {{ __('Please enter a meeting title.') }}
                            </div>
                        </div>
                    </div>

                    <!-- Meeting Date and Time -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('date', __('Meeting Date'), ['class' => 'form-label']) }}
                            {{ Form::text('date', null, ['class' => 'form-control datepicker', 'required' => true]) }}
                            <div class="invalid-feedback">
                                {{ __('Please select a meeting date.') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('time', __('Meeting Time'), ['class' => 'form-label']) }}
                            {{ Form::text('time', null, ['class' => 'form-control timepicker', 'required' => true]) }}
                            <div class="invalid-feedback">
                                {{ __('Please select a meeting time.') }}
                            </div>
                        </div>
                    </div>

                    <!-- Meeting Notes -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('note', __('Meeting Note'), ['class' => 'form-label']) }}
                            {{ Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => __('Enter Meeting Note'), 'rows' => 3]) }}
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
@endsection
