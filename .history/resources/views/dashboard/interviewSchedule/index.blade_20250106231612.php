@extends('dashboard.layouts.master')

@section('page-title')
    {{__('Manage Interview Schedule')}}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">
@endpush


@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Interview Schedule')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Interview Schedule') }}
                </a>
            @endcan
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="card">
                    <div class="card-header">
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
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-0">{{__('Schedule List')}}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-wrapper p-3 schedule-box">
                    @foreach ($schedules as $schedule)
                        <div class="card mb-3 border shadow-none">
                            <div class="px-3 py-3">
                                <div class="row align-items-center">
                                    <div class="col ml-n2">
                                        <h5 class="text-sm mb-0">
                                            <a href="#!">{{!empty($schedule->applications) ? !empty($schedule->applications->jobs) ? $schedule->applications->jobs->title : '' : ''}}</a>
                                        </h5>
                                        <p class="card-text small text-muted mt-2">
                                            {{ !empty($schedule->applications)?$schedule->applications->name:'' }}
                                        </p>
                                        <p class="card-text small text-muted">
                                            {{  \Auth::user()->dateFormat($schedule->date).' '. \Auth::user()->timeFormat($schedule->time) }}
                                        </p>
                                    </div>
                                    <div class="col-auto text-right">
                                        @can('Edit Interview Schedule')
                                            <a href="{{ route('interview-schedule.edit', $schedule->id) }}"
                                               class="btn btn-sm btn-success"

                                               title="{{ __('Edit') }}"
                                               aria-label="{{ __('Edit') }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endcan

                                        @can('Delete Interview Schedule')
                                        <a href="#"
                                        class="btn btn-sm btn-danger delete-icon"
                                        data-toggle="tooltip"
                                        title="{{ __('Delete') }}"
                                        aria-label="{{ __('Delete') }}"
                                        onclick="return confirmDelete('{{ __('Are you sure?') }}', '{{ __('This action cannot be undone. Do you want to continue?') }}', '{{ $schedule->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['interview-schedule.destroy', $schedule->id],
                                            'id' => 'delete-form-' . $schedule->id,
                                            'class' => 'd-none'
                                        ]) !!}
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

                {{Form::open(array('url'=>'interview-schedule','method'=>'post'))}}
                <div class="row">
                    <div class="form-group col-md-6">
                        {{Form::label('candidate',__('Interviewer'),['class'=>'form-control-label'])}}
                        {{ Form::select('candidate', $candidates,null, array('class' => 'form-control select2','required'=>'required')) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('employee',__('Assign Employee'),['class'=>'form-control-label'])}}
                        {{ Form::select('employee', $employees,null, array('class' => 'form-control select2','required'=>'required')) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('date',__('Interview Date'),['class'=>'form-control-label'])}}
                        {{Form::text('date',null,array('class'=>'form-control datepicker'))}}
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('time',__('Interview Time'),['class'=>'form-control-label'])}}
                        {{Form::text('time',null,array('class'=>'form-control timepicker'))}}
                    </div>
                    <div class="form-group col-md-12">
                        {{Form::label('comment',__('Comment'),['class'=>'form-control-label'])}}
                        {{Form::textarea('comment',null,array('class'=>'form-control'))}}
                    </div>
                    <div class="col-12">
                        <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
                        <button type="button" class="btn btn-close-white" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
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

            @if($candidate!=0)
                <script>
                    $('select#candidate').val({{$candidate}}).trigger('change');
                </script>


            @endif


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
            }, (e = a).fullCalendar(t), $("body").on("click", ".new-event--add", function () {
                var t = $(".new-event--title").val(), a = {
                    Stored: [], Job: function () {
                        var e = Date.now().toString().substr(6);
                        return this.Check(e) ? this.Job() : (this.Stored.push(e), e)
                    }, Check: function (e) {
                        for (var t = 0; t < this.Stored.length; t++) if (this.Stored[t] == e) return !0;
                        return !1
                    }
                };
                "" != t ? (e.fullCalendar("renderEvent", {id: a.Job(), title: t, start: $(".new-event--start").val(), end: $(".new-event--end").val(), allDay: !0, className: $(".event-tag input:checked").val()}, !0), $(".new-event--form")[0].reset(), $(".new-event--title").closest(".form-group").removeClass("has-danger"), $("#new-event").modal("hide")) : ($(".new-event--title").closest(".form-group").addClass("has-danger"), $(".new-event--title").focus())
            }), $("body").on("click", "[data-calendar]", function () {
                var t = $(this).data("calendar"), a = $(".edit-event--id").val(), n = $(".edit-event--title").val(), o = $(".edit-event--description").val(), i = $("#edit-event .event-tag input:checked").val(), s = e.fullCalendar("clientEvents", a);
                "update" === t && ("" != n ? (s[0].title = n, s[0].description = o, s[0].className = [i], console.log(i), e.fullCalendar("updateEvent", s[0]), $("#edit-event").modal("hide")) : ($(".edit-event--title").closest(".form-group").addClass("has-error"), $(".edit-event--title").focus())), "delete" === t && ($("#edit-event").modal("hide"), setTimeout(function () {
                    swal({title: "Are you sure?", text: "You won't be able to revert this!", type: "warning", showCancelButton: !0, buttonsStyling: !1, confirmButtonClass: "btn btn-danger", confirmButtonText: "Yes, delete it!", cancelButtonClass: "btn btn-secondary"}).then(function (t) {
                        t.value && (e.fullCalendar("removeEvents", a), swal({title: "Deleted!", text: "The event has been deleted.", type: "success", buttonsStyling: !1, confirmButtonClass: "btn btn-primary"}))
                    })
                }, 200))
            }), $("body").on("click", "[data-calendar-view]", function (t) {
                t.preventDefault(), $("[data-calendar-view]").removeClass("active"), $(this).addClass("active");
                var a = $(this).attr("data-calendar-view");
                e.fullCalendar("changeView", a)
            }), $("body").on("click", ".fullcalendar-btn-next", function (t) {
                t.preventDefault(), e.fullCalendar("next")
            }), $("body").on("click", ".fullcalendar-btn-prev", function (t) {
                t.preventDefault(), e.fullCalendar("prev")
            }))
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
                    console.log(data)
                    show_toastr('Suceess', data.success, 'success');
                    // setTimeout(function () {
                    //     window.location.reload();
                    // }, 1000);
                }
            });
        });

    </script>

@endsection

