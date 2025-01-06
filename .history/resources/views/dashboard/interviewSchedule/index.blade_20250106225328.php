@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Interview Schedule') }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('public/assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">
@endpush

@section('content')
    <div class="row">
        <!-- Create Button -->
        <div class="col-12 text-right mb-4">
            @can('Create Interview Schedule')
                <a href="#" data-url="{{ route('interview-schedule.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{ __('Create New Interview Schedule') }}">
                    <i class="fa fa-plus"></i> {{ __('Create') }}
                </a>
            @endcan
        </div>

        <!-- Calendar Section -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">{{ __('Interview Schedule Calendar') }}</h5>
                        </div>
                        <div>
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-sm btn-light fullcalendar-btn-prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-light fullcalendar-btn-next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="calendar e-height" id="schedule_calendar"></div>
                </div>
            </div>
        </div>

        <!-- Schedule List Section -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Schedule List') }}</h5>
                </div>
                <div class="card-body">
                    @foreach ($schedules as $schedule)
                        <div class="card mb-3 border shadow-none">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0">
                                            <a href="#!">{{ $schedule->applications->jobs->title ?? '' }}</a>
                                        </h6>
                                        <p class="text-sm text-muted mb-0">
                                            {{ $schedule->applications->name ?? '' }}
                                        </p>
                                        <p class="text-sm text-muted mb-0">
                                            {{ \Auth::user()->dateFormat($schedule->date) . ' ' . \Auth::user()->timeFormat($schedule->time) }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        @can('Edit Interview Schedule')
                                            <a href="#" data-url="{{ route('interview-schedule.edit', $schedule->id) }}" data-title="{{ __('Edit Interview Schedule') }}" data-ajax-popup="true" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('Delete Interview Schedule')
                                            <a href="#" class="btn btn-sm btn-danger delete-icon" data-toggle="tooltip" title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?') . '|' . __('This action cannot be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $schedule->id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['interview-schedule.destroy', $schedule->id], 'id' => 'delete-form-' . $schedule->id, 'class' => 'd-none']) !!}
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

@push('scripts')
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var calendar = $('#schedule_calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                buttonIcons: {
                    prev: 'fa fa-angle-left',
                    next: 'fa fa-angle-right'
                },
                themeSystem: 'bootstrap',
                selectable: true,
                selectHelper: true,
                editable: false,
                events: {!! $arrSchedule !!},
                eventClick: function (event) {
                    if (event.url) {
                        $("#commonModal .modal-title").html('Interview Schedule Details');
                        $("#commonModal .modal-dialog").addClass('modal-md');
                        $("#commonModal").modal('show');
                        $.get(event.url, {}, function (data) {
                            $('#commonModal .modal-body').html(data);
                        });
                        return false;
                    }
                },
                viewRender: function (view) {
                    $('.fullcalendar-title').html(view.title);
                }
            });

            $('.fullcalendar-btn-prev').click(function () {
                $('#schedule_calendar').fullCalendar('prev');
            });

            $('.fullcalendar-btn-next').click(function () {
                $('#schedule_calendar').fullCalendar('next');
            });

            $('[data-calendar-view]').click(function () {
                var view = $(this).attr('data-calendar-view');
                $('#schedule_calendar').fullCalendar('changeView', view);
                $('[data-calendar-view]').removeClass('active');
                $(this).addClass('active');
            });

            $(document).on('change', '.stages', function () {
                var id = $(this).val();
                var schedule_id = $(this).attr('data-scheduleid');

                $.ajax({
                    url: "{{ route('job.application.stage.change') }}",
                    type: 'POST',
                    data: {
                        "stage": id,
                        "schedule_id": schedule_id,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        show_toastr('Success', data.success, 'success');
                    }
                });
            });
        });
    </script>
@endpush
