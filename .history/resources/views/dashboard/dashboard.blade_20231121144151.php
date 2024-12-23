@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection

@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.css') }}">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/morris/morris.css')}}">

@endpush

@section('content')

    @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if(\Auth::user()->type == 'employee' && $companyslate && \Auth::user()->company_slate_readed != 1)
        <div class="row">
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div style="height:500px;" class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <h3> {{$companyslate['title'.$lang]}} </h3>
                        </div>

                        <div class="modal-body">
                            <embed
                                src="{{asset(Storage::url($companyslate['file'.$lang]))}}#toolbar=0&navpanes=0&scrollbar=0"
                                type="application/pdf"
                                frameBorder="0"
                                scrolling="auto"
                                height="100%"
                                width="100%">
                            </embed>
                        </div>

                        <div class="modal-footer">
                            <a style="color:#fff;" target="__blank" class="col-md-4 btn btn-success" href="{{asset(Storage::url($companyslate['file'.$lang]))}}"> <i class="fa fa-eye" aria-hidden="true"></i> {{__('Preview')}}</a>
                            <a style="color:#fff;"  class="col-md-4 btn btn-info" href="{{asset(Storage::url($companyslate['file'.$lang]))}}" download> <i class="fa fa-download" aria-hidden="true"></i> {{__('Download')}}</a>

                            {!! Form::open(['method' => 'POST', 'class' => 'col-md-4', 'route' => ['companyslate.accept'] ]) !!}
                                <button style="width:100%;" type="submit"  class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> {{__('Accept')}}</button>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(\Auth::user()->type != 'employee')

{{--        test--}}
{{--<div class="row">--}}
{{--    <div class="col-md-12">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6 text-center">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h3 class="card-title">Total Revenue</h3>--}}
{{--                        <div id="bar-charts"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 text-center">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h3 class="card-title">Sales Overview</h3>--}}
{{--                        <div id="line-charts"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body text-center">
                <span class="dash-widget-icon"><i class="fa fa-2x fa-cubes text-success"></i></span>
                <div class="dash-widget-info">

                    <h3 class="text-center">{{$Announcements->count()}}</h3>
                    <span>{{__('latest_Announcements')}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body text-center">
                <span class="dash-widget-icon"><i class="fa fa-2x fa-users text-warning"></i></span>
                <div class="dash-widget-info">
                    <h3 class="text-center">{{$events->count()}}</h3>
                    <span>{{__('Today_events')}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body text-center">
                <span class="dash-widget-icon"><i class="fa fa-2x fa-diamond text-info"></i></span>
                <div class="dash-widget-info text-center mt-10">
                    <h3 class="text-center">{{$events->count()}}</h3>
                    <span>{{__('Today_events')}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body text-center">
                <span class="dash-widget-icon"><i class="fa fa-2x fa-user text-dark "></i></span>
                <div class="dash-widget-info">
                    <h3 class="text-center">{{$meetings->count()}}</h3>
                    <span>{{__('Today_Meetings')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{--endtest--}}



        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div style="width:100%;" class="ibox">
                        <div class="ibox-title text-center">
                            <h5>{{__("Employee List")}} </h5>
                        </div>

                        <div class="ibox-content">
                            <div class="row">

                                <div class="col-lg-12">
                                    <ul class="stat-list row">

                                        <li class="col-lg-4">
                                            <h2 class="no-margins">{{$totalemployees->count()}}</h2>
                                            <small>{{__('employee numbers')}}</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 100%;" class="progress-bar bg-warning"></div>
                                            </div>
                                        </li>

                                        <li class="col-lg-4">
                                            <h2 class="no-margins text-info ">{{$joinedEmployees}}</h2>
                                            <small>{{__('Joined this month')}}</small>
                                            <div class="stat-percent">{{ $totalemployees->count() != 0 ? round(($joinedEmployees / $totalemployees->count()) * 100 , 2): 0 }}% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: {{ $totalemployees->count() != 0 ? ($joinedEmployees / $totalemployees->count()) * 100 : 0 }}%;" class="progress-bar bg-info"></div>
                                            </div>
                                        </li>

                                        <li class="col-lg-4">
                                            <h2 class="no-margins">{{$offboardEmployees}}</h2>
                                            <small>{{__('Offboarded this month')}}</small>
                                            <div class="stat-percent">{{ $totalemployees->count() != 0 ? round((($offboardEmployees / $totalemployees->count()) * 100) , 2)  : 0}}% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: {{ $totalemployees->count() != 0 ? ($offboardEmployees / $totalemployees->count()) * 100  : 0}}%;" class="progress-bar"></div>
                                            </div>
                                        </li>

                                        <li class="col-lg-4">
                                            <h2 class="no-margins ">{{$countOpenTicket}}</h2>
                                            <small>{{__('Open ticket')}}</small>
                                            <div class="stat-percent">{{ $countTicket != 0 ? round((($countOpenTicket / $countTicket) * 100),2) : 0 }}% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini ">
                                                <div style="width: {{ $countTicket != 0 ? ($countOpenTicket / $countTicket) * 100 : 0 }}%;" class="progress-bar bg-info"></div>
                                            </div>
                                        </li>

                                        <li class="col-lg-4">
                                            <h2 class="no-margins ">{{$countTicket}}</h2>
                                            <small>{{__('Close ticket')}}</small>
                                            <div class="stat-percent">{{ $countTicket != 0 ? round((($countCloseTicket / $countTicket) * 100),2)  : 0}}% <i class="fa fa-level-down text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: {{ $countTicket != 0 ? ($countCloseTicket / $countTicket) * 100  : 0}}%;" class="progress-bar bg-danger"></div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <h5 class="text-center  col-lg-12 mt-4"><a class="btn btn-md btn-warning" href="{{ route('employee.index') }}"> {{ __('Employees_show') }} </a></h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div style="width:100%;" class="ibox">
                        <div class="ibox-title">
                            <h5>{{__("Today's Not Clock In")}} </h5>
                        </div>

                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-5 table-responsive">
                                    <table class="table align-items-center">
                                        <thead>
                                            <tr>
                                                <th >{{__('Employee Id')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Status')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach($totalemployees as $employee)
                                                <tr>
                                                    <td class="Id">
                                                        <input type="hidden" value="{{$employee->id}}" name="employee_id[]">
                                                        <a href="{{route('employee.show',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))}}" class="">{{ \Auth::user()->employeeIdFormat($employee->employee_id) }}</a>
                                                    </td>
                                                    <td>{{ $employee->name }}</td>
                                                    <td><span class="absent-btn"> @if(in_array($employee->id,$attendanceEmployee)) <span class="text-success"> {{ __('Present')}} </span> @else <span class="text-danger"> {{__('Absent')}} </span> @endif</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>

                                <div class="col-lg-7">
{{--                                    <ul class="stat-list">--}}
{{--                                        <li>--}}
{{--                                            <h2 class="no-margins">{{$totalemployees->count()}}</h2>--}}
{{--                                            <small>عدد الموظفين</small>--}}
{{--                                            <div class="progress progress-mini">--}}
{{--                                                <div style="width: 100%;" class="progress-bar"></div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <h2 class="no-margins ">{{$notClockIns->count()}}</h2>--}}
{{--                                            <small>غياب</small>--}}
{{--                                            <div class="stat-percent">{{ $totalemployees->count() != 0 ? round(($notClockIns->count() / $totalemployees->count()) * 100 , 2) : 0 }}% <i class="fa fa-level-down text-navy"></i></div>--}}
{{--                                            <div class="progress progress-mini">--}}
{{--                                                <div style="width: {{ $totalemployees->count() != 0 ? ($notClockIns->count() / $totalemployees->count()) * 100 : 0 }}%;" class="progress-bar"></div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <h2 class="no-margins ">{{$ClockIns->count()}}</h2>--}}
{{--                                            <small>حضور</small>--}}
{{--                                            <div class="stat-percent">{{ $totalemployees->count() != 0 ? round(($ClockIns->count() / $totalemployees->count()) * 100 , 2) : 0 }}% <i class="fa fa-level-down text-navy"></i></div>--}}
{{--                                            <div class="progress progress-mini">--}}
{{--                                                <div style="width: {{ $totalemployees->count() != 0 ? ($ClockIns->count() / $totalemployees->count()) * 100 : 0 }}%;" class="progress-bar"></div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

{{--                                        <li>--}}
{{--                                            <h2 class="no-margins ">0</h2>--}}
{{--                                            <small>تأخير</small>--}}
{{--                                            <div class="stat-percent">{{ $totalemployees->count() != 0 ? round((0 / $totalemployees->count()) * 100 , 2) : 0}}% <i class="fa fa-level-down text-navy"></i></div>--}}
{{--                                            <div class="progress progress-mini">--}}
{{--                                                <div style="width: {{ $totalemployees->count() != 0 ? (0 / $totalemployees->count()) * 100 : 0}}%;" class="progress-bar"></div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

{{--                                        <li>--}}
{{--                                            <h2 class="no-margins ">0</h2>--}}
{{--                                            <small>خروج مبكر</small>--}}
{{--                                            <div class="stat-percent">{{ $totalemployees->count() != 0 ? round((0 / $totalemployees->count()) * 100 , 2) : 0 }}% <i class="fa fa-level-down text-navy"></i></div>--}}
{{--                                            <div class="progress progress-mini">--}}
{{--                                                <div style="width: {{ $totalemployees->count() != 0 ? (0 / $totalemployees->count()) * 100 : 0 }}%;" class="progress-bar"></div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

{{--                                        <li>--}}
{{--                                            <h2 class="no-margins ">{{0}}</h2>--}}
{{--                                            <small>عمل إضافى</small>--}}
{{--                                            <div class="stat-percent">{{ $totalemployees->count() != 0 ? round((0 / $totalemployees->count()) * 100 , 2) : 0 }}% <i class="fa fa-level-down text-navy"></i></div>--}}
{{--                                            <div class="progress progress-mini">--}}
{{--                                                <div style="width: {{ $totalemployees->count() != 0 ? (0 / $totalemployees->count()) * 100 : 0 }}%;" class="progress-bar"></div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

{{--                                    </ul>--}}

                                        <h4>احصاءات الشهرية</h4>
                                        Visits<span class="pull-right strong">+ 45%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45"aria-valuemin="0" aria-valuemax="100" style="width:45%">45%</div>
                                        </div>

                                        انجازات في خطة سنوية<span class="pull-right strong">+ 57%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="57"aria-valuemin="0" aria-valuemax="100" style="width:57%">57%</div>
                                        </div>

                                       ترقية الموظفين<span class="pull-right strong">+ 25%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25"aria-valuemin="0" aria-valuemax="100" style="width:25%">25%</div>
                                        </div>

                                </div>

                                <h5 class="text-center col-lg-12 mt-4"><a class="btn btn-md btn-danger btn-outline-dark" href="{{ route('attendanceemployee.index') }}"> {{ __('timesheet_show') }} </a></h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

{{--    <div @if(\Auth::user()->type == 'employee') style="display:none;" @endif class="row  border-bottom white-bg dashboard-header">--}}
{{--        <div class="col-md-6">--}}
{{--            <small>{{__('latest_Announcements')}}</small>--}}
{{--            <ul class="list-group clear-list m-t">--}}
{{--                @if($Announcements->count() != 0)--}}
{{--                    @foreach($Announcements as $key => $Announcement)--}}
{{--                        <li class="list-group-item fist-item">--}}
{{--                            <span class="float-right">--}}
{{--                                {{$Announcement->employee->name}}--}}
{{--                            </span>--}}
{{--                            <span class="label label-success">{{$key+1}}</span> {{$Announcement->title}}--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                @else--}}
{{--                <p class="text-center"> {{__('No_Announcements_today')}} </p>--}}
{{--                @endif--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <div class="col-md-6">--}}
{{--            <div class="flot-chart dashboard-chart">--}}
{{--                <canvas style="height: -webkit-fill-available;" class="flot-chart-content" id="flot-dashboard-chart"></canvas>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="ibox ">--}}
{{--                        <div class="ibox-title">--}}
{{--                            <h5>{{__('Today_events')}}</h5>--}}
{{--                            <div class="ibox-tools">--}}
{{--                                <span class="label label-warning-light float-right">{{$events->count()}}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content inspinia-timeline">--}}
{{--                            @if($events->count() != 0)--}}
{{--                                @foreach($events as $key => $event)--}}
{{--                                    <div class="timeline-item">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-4 date">--}}
{{--                                                <i class="fa fa-briefcase"></i>--}}

{{--                                            </div>--}}
{{--                                            <div class="col content @if($key == 0) no-top-border @endif"  >--}}
{{--                                                <p class="m-b-xs"><strong>{{$event['title'.$lang]}}</strong>--}}
{{--                                                <br> {{$event->start_date}} - {{$event->end_date}}--}}
{{--                                            </p>--}}

{{--                                                <p>{{$event['description'.$lang]}}</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                <p class="text-center"> {{__('No_events_today')}} </p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6">--}}
{{--                    <div class="ibox ">--}}
{{--                        <div class="ibox-title">--}}
{{--                            <h5>{{__('Today_Meetings')}}</h5>--}}
{{--                            <div class="ibox-tools">--}}
{{--                                <span class="label label-warning-light float-right">{{$meetings->count()}}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content inspinia-timeline">--}}
{{--                            @if($meetings->count() != 0)--}}
{{--                                @foreach($meetings as $key => $meet)--}}
{{--                                    <div class="timeline-item">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-4 date">--}}
{{--                                                <i class="fa fa-briefcase"></i>--}}
{{--                                                {{$meet->time}}--}}
{{--                                                <br/>--}}
{{--                                            </div>--}}
{{--                                            <div class="col content @if($key == 0) no-top-border @endif"  >--}}
{{--                                                <p class="m-b-xs"><strong>{{$meet->title}}</strong></p>--}}
{{--                                                <p>{{$meet->note}}</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                <p class="text-center"> {{__('No_meetings_today')}} </p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6">--}}
{{--                    <div class="ibox">--}}

{{--                        <div class="ibox-title">--}}
{{--                            <h5>{{__('Report')}}</h5>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content">--}}
{{--                            <div>--}}
{{--                                <div class="float-right text-right">--}}
{{--                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>--}}
{{--                                    <br/>--}}
{{--                                    <small class="font-bold"> {{\Auth()->user()->priceFormat($filterData['totalBasicSalary'] )}}</small>--}}
{{--                                </div>--}}
{{--                                <h4> {{__('totalBasicSalary')}} </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content">--}}
{{--                            <div>--}}
{{--                                <div class="float-right text-right">--}}
{{--                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>--}}
{{--                                    <br/>--}}
{{--                                    <small class="font-bold"> {{\Auth()->user()->priceFormat($filterData['totalNetSalary'])}}</small>--}}
{{--                                </div>--}}

{{--                                <h4> {{__('totalNetSalary')}} </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content">--}}
{{--                            <div>--}}
{{--                                <div class="float-right text-right">--}}
{{--                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>--}}
{{--                                    <br/>--}}
{{--                                    <small class="font-bold"> {{\Auth()->user()->priceFormat($filterData['totalAllowance'])}}</small>--}}
{{--                                </div>--}}

{{--                                <h4> {{__('totalAllowance')}} </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content">--}}
{{--                            <div>--}}
{{--                                <div class="float-right text-right">--}}
{{--                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>--}}
{{--                                    <br/>--}}
{{--                                    <small class="font-bold"> {{\Auth()->user()->priceFormat($filterData['totalCommision'])}}</small>--}}
{{--                                </div>--}}

{{--                                <h4> {{__('totalCommision')}} </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content">--}}
{{--                            <div>--}}
{{--                                <div class="float-right text-right">--}}
{{--                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>--}}
{{--                                    <br/>--}}
{{--                                    <small class="font-bold"> {{\Auth()->user()->priceFormat($filterData['totalLoan']) }}</small>--}}
{{--                                </div>--}}

{{--                                <h4> {{__('totalLoan')}} </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content">--}}
{{--                            <div>--}}
{{--                                <div class="float-right text-right">--}}
{{--                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>--}}
{{--                                    <br/>--}}
{{--                                    <small class="font-bold"> {{\Auth()->user()->priceFormat($filterData['totalSaturationDeduction']) }}</small>--}}
{{--                                </div>--}}

{{--                                <h4> {{__('totalSaturationDeduction')}} </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content">--}}
{{--                            <div>--}}
{{--                                <div class="float-right text-right">--}}
{{--                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>--}}
{{--                                    <br/>--}}
{{--                                    <small class="font-bold"> {{\Auth()->user()->priceFormat($filterData['totalOtherPayment'])}}</small>--}}
{{--                                </div>--}}

{{--                                <h4> {{__('totalOtherPayment')}} </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content">--}}
{{--                            <div>--}}
{{--                                <div class="float-right text-right">--}}
{{--                                    <span class="bar_dashboard">5,3,9,6,5,9,7,3,5,2,4,7,3,2,7,9,6,4,5,7,3,2,1,0,9,5,6,8,3,2,1</span>--}}
{{--                                    <br/>--}}
{{--                                    <small class="font-bold"> {{\Auth()->user()->priceFormat($filterData['totalOverTime'])}}</small>--}}
{{--                                </div>--}}

{{--                                <h4> {{__('totalOverTime')}} </h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-6">--}}
{{--                    <div class="ibox ">--}}
{{--                        <div class="ibox-title">--}}
{{--                            <h5>{{__('Finance')}}</h5>--}}
{{--                            <div class="ibox-tools">--}}
{{--                                <span class="label label-warning-light float-right">{{$meetings->count()}}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ibox-content inspinia-timeline">--}}
{{--                        <div class="col-lg-12">--}}
{{--                                <canvas id="doughnutChart" width="200" height="200" style="margin: 18px auto 0"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection


@push('theme-script')
    <script src="{{ asset('assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>
@endpush
@push('script-page')
    <script>
        // event_calendar (not working now)
        var e, t, a = $('[data-toggle="event_calendar"]');
        a.length && (t = {
            header: {right: "", center: "", left: ""},
            buttonIcons: {prev: "calendar--prev", next: "calendar--next"},
            theme: !1,
            selectable: !0,
            selectHelper: !0,
            editable: !0,
            events: {!! json_encode($arrEvents) !!} ,
            eventStartEditable: !1,
            locale: '{{basename(App::getLocale())}}',
            dayClick: function (e) {
                var t = moment(e).toISOString();
                $("#new-event").modal("show"), $(".new-event--title").val(""), $(".new-event--start").val(t), $(".new-event--end").val(t)
            },
            eventResize: function (event) {
                var eventObj = {
                    start: event.start.format(),
                    end: event.end.format(),
                };

                /*$.ajax({
                    url: event.resize_url,
                    method: 'PUT',
                    data: eventObj,
                    success: function (response) {
                    },
                    error: function (data) {
                        data = data.responseJSON;
                    }
                });*/
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <script>
        const ctx    = document.getElementById('flot-dashboard-chart').getContext('2d');
        var depts    = <?php echo $depts; ?>;
        var empcount = <?php echo $empcount; ?>;

        const myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: depts,
                datasets: [{
                    label: "",
                    fill: !0,
                    backgroundColor: "rgba(156,204,101,.45)",
                    borderColor: "rgba(156,204,101,1)",
                    pointBackgroundColor: "rgba(156,204,101,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(156,204,101,1)",
                    data: empcount,
                }, ],
            },
            options: {
                animations: {
                radius: {
                    duration: 400,
                    easing: 'linear',
                    loop: (context) => context.active
                }
                },
                hoverRadius: 12,
                hoverBackgroundColor: 'yellow',
                interaction: {
                mode: 'nearest',
                intersect: false,
                axis: 'x'
                },
                plugins: {
                    tooltips: {
                    callbacks: {
                        label: function(e, r) {
                            return " $ " + e.yLabel;
                        },
                    },
                },
                }
            },
        });


        var doughnutData = {
            labels: ["{{__('totalBasicSalary')}}","{{__('totalNetSalary')}}","{{__('totalAllowance')}}",
                     "{{__('totalCommision')}}"],
            datasets: [{
                data: {{json_encode($pieChartData)}},
                backgroundColor: ["#a3e1d4","#dedede","#9CC3DA","#9CC3AA"]
            }]
        };


        var doughnutOptions = {
            responsive: false,
            legend: {
                display: true
            }
        };


        var ctx4 = document.getElementById("doughnutChart").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

    </script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#exampleModal').modal('show');
        });
    </script>
    <script src="{{asset('admin\plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('admin\plugins/morris/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin\js\chart.js')}}"></script>
@endpush

