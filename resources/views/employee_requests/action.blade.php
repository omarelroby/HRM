    {{Form::open(array('url'=>'employee_requests/changeaction','method'=>'post'))}}
    <div class="row">

        <div class="col-12">
            <table class="table table-striped mb-0 dataTable no-footer">
                <tr role="row">
                    <th>{{__('Employee')}}</th>
                    <td>{{ !empty($employee->name)?$employee->name:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Request_type')}}</th>
                    <td>{{ !empty($requesttype['name'.$lang])?$requesttype['name'.$lang]:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Request Date')}}</th>
                    <td>{{\Auth::user()->dateFormat( $employee_request->applied_on) }}</td>
                </tr>
                <tr>
                    <th>{{__('Start Date')}}</th>
                    <td>{{ \Auth::user()->dateFormat($employee_request->start_date) }}</td>
                </tr>
                <tr>
                    <th>{{__('End Date')}}</th>
                    <td>{{ \Auth::user()->dateFormat($employee_request->end_date) }}</td>
                </tr>
                <tr>
                    <th>{{__('Request Reason')}}</th>
                    <td>{{ !empty($employee_request['request_reason'.$lang])?$employee_request['request_reason'.$lang]:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Status')}}</th>
                    <td>
                        @if($employee_request->status == 0)
                            <div class="badge badge-pill badge-warning">{{ __('Pending') }}</div>
                        @elseif($employee_request->status == 1)
                            <div class="badge badge-pill badge-success">{{ __('Approve By Department Manager') }}</div>
                        @elseif($employee_request->status == 2)
                            <div class="badge badge-pill badge-danger">{{ __('Reject By Department Manager') }}</div>
                        @elseif($employee_request->status == 3)
                            <div class="badge badge-pill badge-success">{{ __('Approve By Branch Manager') }}</div>
                        @elseif($employee_request->status == 4)
                            <div class="badge badge-pill badge-danger">{{ __('Reject By Branch Manager') }}</div>
                        @endif
                    </td>
                </tr>
                <input type="hidden" value="{{ $employee_request->id }}" name="leave_id">
            </table>
        </div>
       
        <div class="col-12">
            @if($employee_request->employees->department && auth()->user()->employee && $employee_request->employees->department->employee_id == auth()->user()->employee->id && $employee_request->status == 0 )
                <button type="submit" class="btn btn-success" value="1" name="status">{{__('Approve')}}</button>
                <button type="submit" class="btn btn-danger" value="2" name="status">{{__('Reject')}}</button>
            @elseif($employee_request->employees->branch && auth()->user()->employee && $employee_request->employees->branch->employee_id == auth()->user()->employee->id && $employee_request->status == 1)
                <button type="submit" class="btn btn-success" value="3" name="status">{{__('Approve')}}</button>
                <button type="submit" class="btn btn-danger" value="4" name="status">{{__('Reject')}}</button>
            @endif
        </div>
        
    </div>
    {{Form::close()}}
