@extends('layouts.admin')
@section('page-title')
    {{__('empAttendance')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                                <tr>
                                    <th>{{__('branch_name')}}</th>
                                    <th>{{__('employee_name')}}</th>
                                    <th>{{__('clock_in_time')}}</th>
                                    <th>{{__('clock_out_time')}}</th>
                                    <th>{{__('attendance_type')}}</th>
                                    <th width="3%">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $attendance)
                                    <tr>
                                        <td>{{ $attendance['branch_name'] }}</td>
                                        <td>{{ $attendance['employee_name'] }}</td>
                                        <td>{{ $attendance['clock_in_time'] }}</td>
                                        <td>{{ $attendance['clock_out_time'] }}</td>
                                        <td>{{ $attendance['type'] }}</td>
                                        <td>{!! $attendance['actions'] !!}</td>
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
