    {{Form::open(array('url'=>'leave/changeaction','method'=>'post'))}}
    <div class="row">
        <div class="col-12">
            <table class="table table-striped mb-0 dataTable no-footer">
                <tr role="row">
                    <th>{{__('Employee')}}</th>
                    <td>{{ !empty($employee->name)?$employee->name:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Leave Type ')}}</th>
                    <td>{{ !empty($leavetype->title)?$leavetype->title:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Appplied On')}}</th>
                    <td>{{\Auth::user()->dateFormat( $leave->applied_on) }}</td>
                </tr>
                <tr>
                    <th>{{__('Start Date')}}</th>
                    <td>{{ \Auth::user()->dateFormat($leave->start_date) }}</td>
                </tr>
                <tr>
                    <th>{{__('End Date')}}</th>
                    <td>{{ \Auth::user()->dateFormat($leave->end_date) }}</td>
                </tr>
                <tr>
                    <th>{{__('Ticket')}}</th>
                    <td>{{ $leave->ticket == 1 ? __('worth_ticket') : __('non_worth_ticket') }}</td>
                </tr>
                <tr>
                    <th>{{__('Leave Reason')}}</th>
                    <td>{{ !empty($leave->leave_reason)?$leave->leave_reason:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Status')}}</th>
                    <td>{{ !empty($leave->status)?$leave->status:'' }}</td>
                </tr>
                <input type="hidden" value="{{ $leave->id }}" name="leave_id">
            </table>
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-success" value="{{__('Approval')}}" name="status">
            <input type="submit" class="btn btn-danger" value="{{__('Reject')}}" name="status">
        </div>
    </div>
    {{Form::close()}}
