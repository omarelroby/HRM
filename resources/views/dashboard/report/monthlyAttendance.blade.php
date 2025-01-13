@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Monthly Attendance')}}
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
    <script>
        var filename = $('#filename').val();
        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                jsPDF: {unit: 'in', format: 'A2'}
            };
            html2pdf().set(opt).from(element).save();
        }
        $(document).ready(function () {
            $(document).on('click', '[data-ajax-popup="true"]', function (e) {
                e.preventDefault();

                // Get URL and Title from the clicked element
                const url = $(this).data('url');
                const title = $(this).data('title');

                // Make an AJAX request to fetch the content
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (response) {
                        // Append modal HTML to the body if not already present
                        if (!$('#ajax-modal').length) {
                            $('body').append(`
                        <div class="modal fade" id="ajax-modal" tabindex="-1" role="dialog" aria-labelledby="ajax-modal-title" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ajax-modal-title"></h5>

                                    </div>
                                    <div class="modal-body" id="ajax-modal-content"></div>
                                </div>
                            </div>
                        </div>
                    `);
                        }

                        // Set modal title and content
                        $('#ajax-modal-title').text(title);
                        $('#ajax-modal-content').html(response);

                        // Show the modal
                        $('#ajax-modal').modal('show');
                    },
                    error: function (xhr) {
                        alert('Failed to load content. Please try again.');
                    }
                });
            });
        });

    </script>
@endpush

@section('content')
    <div id="printableArea">
        <div class="row d-flex justify-content-end">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
                {{ Form::open(array('route' => array('report.monthly.attendance'),'method'=>'get','id'=>'report_monthly_attendance')) }}
                <div class="all-select-box">
                    <div class="btn-box">
                        {{Form::label('month',__('Month'),['class'=>'text-type'])}}
                        {{Form::month('month',isset($_GET['month'])?$_GET['month']:date('Y-m'),array('class'=>'month-btn form-control'))}}
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12">
                <div class="all-select-box">
                    <div class="btn-box">
                        {{ Form::label('branch', __('Branch'),['class'=>'text-type']) }}
                        {{ Form::select('branch', $branch,isset($_GET['branch'])?$_GET['branch']:'', array('class' => 'form-control select2')) }}
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 col-12">
                <div class="all-select-box">
                    <div class="btn-box">
                        {{ Form::label('department', __('Department'),['class'=>'text-type']) }}
                        {{ Form::select('department', $department,isset($_GET['department'])?$_GET['department']:'', array('class' => 'form-control select2')) }}
                    </div>
                </div>
            </div>

            <div class="col-auto my-custom">
                <a href="#" class="apply-btn btn btn-primary mt-4" onclick="document.getElementById('report_monthly_attendance').submit(); return false;" data-toggle="tooltip" data-original-title="{{__('apply')}}">
                    <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                </a>
                <a href="{{route('report.monthly.attendance')}}" class="reset-btn btn btn-danger mt-4" data-toggle="tooltip" data-original-title="{{__('Reset')}}">
                    <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                </a>

                <a href="{{route('report.attendance',[isset($_GET['month'])?$_GET['month']:date('Y-m'),(isset($_GET['branch']) && !empty($_GET['branch'])) ?$_GET['branch']:0,(isset($_GET['department']) && !empty($_GET['department'])) ?$_GET['department']:0])}}" class="action-btn btn btn-info mt-4" >
                    <span class="btn-inner--icon"><i class="fa fa-download"></i></span>
                </a>
            </div>

        </div>
        {{ Form::close() }}
        <div class="row mt-3">
            <div class="col">
                <input type="hidden" value="{{  $data['branch'] .' '.__('Branch') .' '.$data['curMonth'].' '.__('Attendance Report of').' '. $data['department'].' '.'Department'}}" id="filename">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0">{{__('Report')}} :</h5>
                    <h5 class="report-text mb-0">{{__('Attendance Summary')}}</h5>
                </div>
            </div>
            @if($data['branch']!='All')
                <div class="col">
                    <div class="card p-4 mb-4">
                        <h5 class="report-text gray-text mb-0">{{__('Branch')}} :</h5>
                        <h5 class="report-text mb-0">{{$data['branch']}}</h5>
                    </div>
                </div>
            @endif
            @if($data['department']!='All')
                <div class="col">
                    <div class="card p-4 mb-4">
                        <h5 class="report-text gray-text mb-0">{{__('Department')}} :</h5>
                        <h5 class="report-text mb-0">{{$data['department']}}</h5>
                    </div>
                </div>
            @endif
            <div class="col">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0">{{__('Duration')}} :</h5>
                    <h5 class="report-text mb-0">{{$data['curMonth']}}</h5>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="card p-4 mb-4">
                    <div class="float-left">
                        <h5 class="report-text gray-text mb-0">{{__('Attendance')}}</h5>
                        <h5 class="report-text mb-0">{{__('Total present')}}: {{$data['totalPresent']}}</h5>
                    </div>
                    <div class="float-right">
                        <h5 class="report-text gray-text mb-0"></h5>
                        <h5 class="report-text mb-0">{{__('Total leave')}} : {{$data['totalLeave']}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0">{{__('Overtime')}}</h5>
                    <h5 class="report-text mb-0">{{__('Total overtime in hours')}} : {{number_format($data['totalOvertime'],2)}}</h5>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0">{{__('Early leave')}}</h5>
                    <h5 class="report-text mb-0">{{__('Total early leave in hours')}} : {{number_format($data['totalEarlyLeave'],2)}}</h5>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="card p-4 mb-4">
                    <h5 class="report-text gray-text mb-0">{{__('Employee late')}}</h5>
                    <h5 class="report-text mb-0">{{__('Total late in hours')}} : {{number_format($data['totalLate'],2)}}</h5>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="all-button-box">
                    <a href="#" class="btn w-100 mb-1 btn-primary btn-icon-only width-auto"
                        data-url="{{ route('attendance.file.import') }}" data-ajax-popup="true"
                        data-title="{{ __('Import Timesheet CSV file') }}">
                        <i class="fa fa-file-csv"></i> {{ __('Import') }}
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="table-responsive py-4 attendance-table-responsive">
                        <table class="table table-striped mb-0" id="dataTable-1">
                            <thead>
                                <tr>
                                    <th class="active">{{__('Name')}}</th>
                                    @foreach($dates as $date)
                                        <th>{{explode('/',$date)[2]}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employeesAttendance as $attendance)
                                    @php
                                       $Employee_Join_date = DB::table('employees')->where('id',$attendance['id'])->value('Join_date_gregorian');
                                    @endphp
                                    <tr>
                                        <td>{{$attendance['name']}}</td>
                                        @foreach($attendance['status'] as $key => $status)
                                            <td>
                                                @if(date("Y-m-d", strtotime(explode('-',$key)[0])) < date("Y-m-d" , strtotime($Employee_Join_date)) )
                                                <span style="color:#1a1818!important"> <b> N </b> </span>
                                                @elseif($status == 'P')
                                                    <span style="color:#28a745!important"> <b> P </b> </span>
                                                @elseif(in_array( explode('-',$key)[1] , explode(',',$setting->week_vacations ?? '') ))
                                                    <span style="color:#424443!important"> <b> O </b> </span>
                                                @elseif(in_array( date("Y-m-d", strtotime(explode('-',$key)[0])) , $holidays ?? '' ))
                                                    <span style="color:#377424!important"> <b> H </b> </span>
                                                @elseif($status =='A')
                                                    <span style="color:#990001!important"> <b> A </b> </span>
                                                @elseif($status =='V')
                                                    <span style="color:#786301!important"> <b> V </b> </span>
                                                @elseif($status =='S')
                                                    <span style="color:#C09000!important"> <b> S </b> </span>
                                                @elseif($status =='X')
                                                    <span style="color:#CC4025!important"> <b> X </b> </span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

