@extends('dashboard.layouts.master')

@section('page-title')
    {{__('Event')}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">
@endsection
@section('content')
    <div class="button-container row justify-content-end my-3">
        @can('Create Ticket')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-sm"">
                    <i class="fa fa-plus"></i> {{__('Create New Ticket')}}
                </a>
            </div>
        @endcan

        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="{{ route('event.export') }}" class="btn btn-primary btn-sm btn-icon-only width-auto" aria-label="{{ __('Export Events') }}">
                <i class="fa fa-file-excel"></i> {{ __('Export') }}
            </a>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" class="btn btn-primary btn-sm btn-icon-only width-auto" data-url="{{ route('event.file.import') }}" data-ajax-popup="true" data-title="{{ __('Import event CSV file') }}" aria-label="{{ __('Import Events') }}">
                <i class="fa fa-file-csv"></i> {{ __('Import') }}
            </a>
        </div>
    </div>
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
    <div class="row">
        <div class="col">
            <!-- Fullcalendar -->
            <div class="card overflow-hidden widget-calendar">
                <div class="calendar e-height" data-toggle="event_calendar" id="event_calendar"></div>
            </div>

        </div>
    </div>
    <!-- Add Event Modal -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header   text-white">
                    <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {{ Form::open(['url' => 'event', 'method' => 'post', 'class' => 'needs-validation', 'novalidate' => true]) }}
                    <div class="row g-3">
                        <!-- Branch Selection -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('branch_id', __('Branch'), ['class' => 'form-label']) }}
                                <select class="form-select select2" name="branch_id" id="branch_id" required>
                                    <option value="" disabled selected>{{ __('Select Branch') }}</option>
                                    <option value="0">{{ __('All Branch') }}</option>
                                    @foreach($branch as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{ __('Please select a branch.') }}</div>
                            </div>
                        </div>

                        <!-- Department Selection -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('department_id', __('Department'), ['class' => 'form-label']) }}
                                <select class="form-select select2" name="department_id[]" id="department_id" multiple>
                                    <!-- Departments will be populated dynamically based on branch selection -->
                                </select>
                            </div>
                        </div>

                        <!-- Employee Selection -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('employee_id', __('Employee'), ['class' => 'form-label']) }}
                                <select class="form-select select2" name="employee_id[]" id="employee_id" multiple>
                                    <!-- Employees will be populated dynamically based on department selection -->
                                </select>
                            </div>
                        </div>

                        <!-- Event Title -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('title', __('Event Title'), ['class' => 'form-label']) }}
                                {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Event Title'), 'required' => true]) }}
                                <div class="invalid-feedback">{{ __('Please enter an event title.') }}</div>
                            </div>
                        </div>

                        <!-- Event Title (Arabic) -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('title_ar', __('Event Title (Arabic)'), ['class' => 'form-label']) }}
                                {{ Form::text('title_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Event Title in Arabic')]) }}
                            </div>
                        </div>

                        <!-- Event Start and End Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('start_date', __('Event Start Date'), ['class' => 'form-label']) }}
                                {{ Form::text('start_date', null, ['class' => 'form-control datepicker', 'required' => true]) }}
                                <div class="invalid-feedback">{{ __('Please select a start date.') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('end_date', __('Event End Date'), ['class' => 'form-label']) }}
                                {{ Form::text('end_date', null, ['class' => 'form-control datepicker', 'required' => true]) }}
                                <div class="invalid-feedback">{{ __('Please select an end date.') }}</div>
                            </div>
                        </div>

                        <!-- Event Color Selection -->
                        <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('color', __('Event Select Color'), ['class' => 'form-label d-block mb-3']) }}
                                <div class="btn-group btn-group-colors event-tag" role="group" aria-label="Event Color Selection">
                                    <input type="radio" class="btn-check" name="color" id="color-info" value="#00B8D9" checked>
                                    <label class="btn btn-outline-info" for="color-info"></label>

                                    <input type="radio" class="btn-check" name="color" id="color-warning" value="#FFAB00">
                                    <label class="btn btn-outline-warning" for="color-warning"></label>

                                    <input type="radio" class="btn-check" name="color" id="color-danger" value="#FF5630">
                                    <label class="btn btn-outline-danger" for="color-danger"></label>

                                    <input type="radio" class="btn-check" name="color" id="color-success" value="#36B37E">
                                    <label class="btn btn-outline-success" for="color-success"></label>

                                    <input type="radio" class="btn-check" name="color" id="color-secondary" value="#EFF2F7">
                                    <label class="btn btn-outline-secondary" for="color-secondary"></label>

                                    <input type="radio" class="btn-check" name="color" id="color-primary" value="#051C4B">
                                    <label class="btn btn-outline-primary" for="color-primary"></label>
                                </div>
                            </div>
                        </div>

                        <!-- Event Description -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('description', __('Event Description'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Enter Event Description'), 'rows' => 3]) }}
                            </div>
                        </div>

                        <!-- Event Description (Arabic) -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('description_ar', __('Event Description (Arabic)'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Event Description in Arabic'), 'rows' => 3]) }}
                            </div>
                        </div>

                        <!-- Buttons -->
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

<!-- Date Picker Script -->

<!-- Date Picker Script -->
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
    <script src="{{ asset('public/assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script>
        // load chart data using these
        // event_calendar (not working now)
        var e, t, a = $('[data-toggle="event_calendar"]');
        a.length && (t = {
            header: {right: "", center: "", left: ""},
            buttonIcons: {prev: "calendar--prev", next: "calendar--next"},
            theme: !1,
            selectable: !0,
            selectHelper: !0,
            editable: !0,
            events: {!! $arrEvents !!} ,
            eventStartEditable: !1,
            locale: '{{basename(App::getLocale())}}',
            console.log(e);

            eventResize: function (event) {
                var eventObj = {
                    start: event.start.format(),
                    end: event.end.format(),
                };

                $.ajax({
                    url: event.resize_url,
                    method: 'PUT',
                    data: eventObj,
                    success: function (response) {

                    },
                    error: function (data) {
                        data = data.responseJSON;
                    }
                });
            },
            viewRender: function (t) {

                e.fullCalendar("getDate").month(), $(".fullcalendar-title").html(t.title)
            },
            eventClick: function (e, t) {
                var title = e.title;
                var url = e.url;


                if (typeof url != 'undefined') {
                    $("#commonModal .modal-title").html(title);
                    $("#commonModal .modal-dialog").addClass('modal-md');
                    $("#commonModal").modal('show');
                    $.get(url, {}, function (data) {

                        $('#commonModal .modal-body').html(data);
                    });
                    return false;
                }
            }
        }, (e = a).fullCalendar(t),
            $("body").on("click", "[data-calendar-view]", function (t) {
                t.preventDefault(), $("[data-calendar-view]").removeClass("active"), $(this).addClass("active");
                var a = $(this).attr("data-calendar-view");
                e.fullCalendar("changeView", a)
            }), $("body").on("click", ".fullcalendar-btn-next", function (t) {
            t.preventDefault(), e.fullCalendar("next")
        }), $("body").on("click", ".fullcalendar-btn-prev", function (t) {
            t.preventDefault(), e.fullCalendar("prev")
        }));


    </script>

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
                url: '{{route('event.getdepartment')}}',
                type: 'POST',
                data: {
                    "branch_id": bid, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {

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
                url: '{{route('event.getemployee')}}',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {

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

@endsection
