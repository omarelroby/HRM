@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Leave') }}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Leave')
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('leaves.create') }}" class="btn btn-primary btn-icon-only width-auto"
                    data-ajax-popup="true" data-title="{{ __('Create Leaves Type') }}">
                    <i class="fa fa-plus"></i> {{ __('Create') }}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5></h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    @if (\Auth::user()->type != 'employee')
                                        <th>{{ __('Employee') }}</th>
                                    @endif
                                    <th>{{ __('Leave Type') }}</th>
                                    <th>{{ __('Applied On') }}</th>
                                    <th>{{ __('Start Date') }}</th>
                                    <th>{{ __('End Date') }}</th>
                                    <th>{{ __('Total Days') }}</th>
                                    <th>{{ __('Leave Reason') }}</th>
                                    <th>{{ __('status') }}</th>
                                    <th width="3%">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                    <tr>
                                        @if (\Auth::user()->type != 'employee')
                                            <td>{{ !empty(\Auth::user()->getEmployee($leave->employee_id)) ? \Auth::user()->getEmployee($leave->employee_id)->name : '' }}
                                            </td>
                                        @endif
                                        <td>{{ !empty(\Auth::user()->getLeaveType($leave->leave_type_id)) ? \Auth::user()->getLeaveType($leave->leave_type_id)->title : '' }}
                                        </td>
                                        <td>{{ \Auth::user()->dateFormat($leave->applied_on) }}</td>
                                        <td>{{ \Auth::user()->dateFormat($leave->start_date) }}</td>
                                        <td>{{ \Auth::user()->dateFormat($leave->end_date) }}</td>
                                        @php
                                            $startDate = new \DateTime($leave->start_date);
                                            $endDate = new \DateTime($leave->end_date);
                                            $total_leave_days = !empty($startDate->diff($endDate)) ? $startDate->diff($endDate)->days : 0;
                                        @endphp
                                        <td>{{ $total_leave_days }}</td>
                                        <td>{{ $leave->leave_reason }}</td>
                                        <td>
                                            @if ($leave->status == 'Pending')
                                                <div class="badge badge-pill badge-warning">{{ $leave->status }}</div>
                                            @elseif($leave->status=="Approve")
                                                <div class="badge badge-pill badge-success">{{ $leave->status }}</div>
                                            @else($leave->status=="Reject")
                                                <div class="badge badge-pill badge-danger">{{ $leave->status }}</div>
                                            @endif
                                        </td>
                                        <td class="text-right action-btns">
                                            @if (\Auth::user()->type == 'employee')
                                                @if ($leave->status == 'Pending')
                                                    @can('Edit Leave')
                                                        <a href="#" data-url="{{ URL::to('leave/' . $leave->id . '/edit') }}"
                                                            data-size="lg" data-ajax-popup="true"
                                                            data-title="{{ __('Edit Leave') }}" class="edit-icon btn btn-success"
                                                            data-toggle="tooltip" data-original-title="{{ __('Edit') }}"><i
                                                                class="fa fa-edit"></i></a>
                                                    @endcan
                                                @endif
                                            @else
                                                <a href="#" data-url="{{ URL::to('leave/' . $leave->id . '/action') }}"
                                                    data-size="lg" data-ajax-popup="true"
                                                    data-title="{{ __('Leave Action') }}" class="edit-icon btn btn-success bg-success"
                                                    data-toggle="tooltip" data-original-title="{{ __('Leave Action') }}"><i
                                                        class="fa fa-caret-right"></i> </a>
                                                @can('Edit Leave')
                                                    <a href="#" data-url="{{ URL::to('leave/' . $leave->id . '/edit') }}"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="{{ __('Edit Leave') }}" class="edit-icon btn btn-success"
                                                        data-toggle="tooltip" data-original-title="{{ __('Edit') }}"><i
                                                            class="fa fa-edit"></i></a>
                                                @endcan
                                            @endif
                                            @can('Delete Leave')
                                                <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip"
                                                    data-original-title="{{ __('Delete') }}"
                                                    data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                                    data-confirm-yes="document.getElementById('delete-form-{{ $leave->id }}').submit();"><i
                                                        class="fa fa-trash"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['leave.destroy', $leave->id], 'id' => 'delete-form-' . $leave->id]) !!}
                                                {!! Form::close() !!}
                                    @endif
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page')
    <script>
        $(document).on('change', '#employee_id', function() {
            var employee_id = $(this).val();

            $.ajax({
                url: '{{ route('leave.jsoncount') }}',
                type: 'POST',
                data: {
                    "employee_id": employee_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {

                    $('#leave_type_id').empty();
                    $('#leave_type_id').append(
                        '<option value="">{{ __('Select Leave Type') }}</option>');

                    $.each(data, function(key, value) {

                        if (value.total_leave >= value.days) {
                            $('#leave_type_id').append('<option value="' + value.id +
                                '" disabled>' + value.title + '&nbsp(' + value.total_leave +
                                '/' + value.days + ')</option>');
                        } else {
                            $('#leave_type_id').append('<option value="' + value.id + '">' +
                                value.title + '&nbsp(' + value.total_leave + '/' + value
                                .days + ')</option>');
                        }
                    });

                }
            });
        });
    </script>
@endpush
