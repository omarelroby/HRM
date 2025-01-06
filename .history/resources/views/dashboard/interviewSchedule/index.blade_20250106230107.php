@extends('dashboard.layouts.master')

@section('page-title')
    {{__('Manage Interview Schedule')}}
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">
    <style>
        .card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f9f9f9;
            border-bottom: 1px solid #e0e0e0;
        }

        .btn-group .btn {
            border-radius: 50px;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .schedule-box .card {
            margin-bottom: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .schedule-box .card .px-3,
        .schedule-box .card .py-3 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .schedule-box .card-header {
            background-color: #f0f0f0;
            font-weight: 600;
        }

        .fullcalendar-btn-prev,
        .fullcalendar-btn-next {
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            padding: 8px;
        }

        .fullcalendar-btn-prev:hover,
        .fullcalendar-btn-next:hover {
            background-color: #0056b3;
        }

        .schedule-list h6 {
            font-weight: 600;
        }

        .schedule-details .card-text {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .edit-icon,
        .delete-icon {
            border-radius: 50%;
            font-size: 1rem;
            padding: 10px;
        }

        .delete-icon {
            background-color: #dc3545;
        }

        .delete-icon:hover {
            background-color: #c82333;
        }

        .edit-icon {
            background-color: #28a745;
        }

        .edit-icon:hover {
            background-color: #218838;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .all-button-box {
                flex-direction: column;
                align-items: flex-start;
            }

            .schedule-box {
                padding: 1rem;
            }

            .schedule-box .card {
                margin-bottom: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="all-button-box row d-flex justify-content-end mb-3">
            @can('Create Interview Schedule')
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#" data-url="{{ route('interview-schedule.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Interview Schedule')}}">
                        <i class="fa fa-plus"></i> {{__('Create')}}
                    </a>
                </div>
            @endcan
        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="page-title">
                            <div class="row justify-content-between align-items-center full-calender">
                                <div class="col d-flex align-items-center">
                                    <div class="btn-group" role="group" aria-label="Calendar Navigation">
                                        <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                    <h5 class="fullcalendar-title h4 d-inline-block font-weight-400 mb-0 ms-3"></h5>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
                                    <div class="btn-group" role="group" aria-label="Calendar Views">
                                        <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="month">{{__('Month')}}</a>
                                        <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicWeek">{{__('Week')}}</a>
                                        <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicDay">{{__('Day')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="overflow-hidden widget-calendar">
                            <div class="calendar e-height" data-toggle="schedule_calendar" id="schedule_calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header schedule-list">
                    <h6>{{__('Schedule List')}}</h6>
                </div>
                <div class="card-body schedule-box">
                    @foreach ($schedules as $schedule)
                        <div class="card mb-3 border shadow-none">
                            <div class="px-3 py-3">
                                <div class="row align-items-center">
                                    <div class="col ml-n2">
                                        <h5 class="text-sm mb-0">
                                            <a href="#!">{{ !empty($schedule->applications) && !empty($schedule->applications->jobs) ? $schedule->applications->jobs->title : '' }}</a>
                                        </h5>
                                        <p class="card-text small text-muted mt-2">
                                            {{ !empty($schedule->applications) ? $schedule->applications->name : '' }}
                                        </p>
                                        <p class="card-text small text-muted">
                                            {{ \Auth::user()->dateFormat($schedule->date) . ' ' . \Auth::user()->timeFormat($schedule->time) }}
                                        </p>
                                    </div>
                                    <div class="col-auto text-end">
                                        @can('Edit Interview Schedule')
                                            <a href="#" data-url="{{ route('interview-schedule.edit', $schedule->id) }}" data-title="{{__('Edit Interview Schedule')}}" data-ajax-popup="true" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('Delete Interview Schedule')
                                            <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$schedule->id}}').submit();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['interview-schedule.destroy', $schedule->id],'id'=>'delete-form-'.$schedule->id]) !!}
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

@section('script')
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script>
        var Fullcalendar = function () {
            var e, t, a = $('[data-toggle="schedule_calendar"]');
            a.length && (t = {
                header: {right: "", center: "", left: ""},
                buttonIcons: {prev: "calendar--prev", next: "calendar--next"},
                theme: !1,
                selectable: !0,
                selectHelper: !0,
                editable: !1,
                events:{!! $arrSchedule !!},
                dayClick: function (e) {
                    var t = moment(e).toISOString();
                    $("#new-event").modal("show"), $(".new-event--title").val(""), $(".new-event--start").val(t), $(".new-event--end").val(t)
                },
                viewRender: function (t) {
                    e.fullCalendar("getDate").month(), $(".fullcalendar-title").html(t.title)
                },
                eventClick: function (e, t) {
                    var title = e.title;
                    var url = e.url;
                    if (typeof url != 'undefined') {
                        $("#commonModal .modal-title").html('Interview Schedule Details');
                        $("#commonModal .modal-dialog").addClass('modal-md');
                        $("#commonModal").modal('show');
                        $.get(url, {}, function (data) {
                            $('#commonModal .modal-body').html(data);
                        });
                        return false;
                    }
                }
            }, (e = a).fullCalendar(t));
        }()

        $(document).on('change', '.stages', function () {
            var id = $(this).val();
            var schedule_id = $(this).attr('data-scheduleid');
            $.ajax({
                url: "{{route('job.application.stage.change')}}",
                type: 'POST',
                data: {
                    "stage": id, "schedule_id": schedule_id, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    show_toastr('Success', data.success, 'success');
                }
            });
        });
    </script>
@endsection
