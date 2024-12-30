@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Employee Request') }}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ __('Employee Requests') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                @if (\Auth::user()->type != 'employee')
                                    <th>{{ __('Employee') }}</th>
                                @endif
                                <th>{{ __('Request Type') }}</th>
                                <th>{{ __('Request Date') }}</th>
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th>{{ __('Request Reason') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th width="5%">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $leave)
                                <tr>
                                    @if (\Auth::user()->type != 'employee')
                                        <td>{{ \Auth::user()->getEmployee($leave->employee_id)->name ?? '' }}</td>
                                    @endif
                                    <td>{{ $leave->requestType['name' . $lang] }}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->applied_on) }}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->start_date) }}</td>
                                    <td>{{ \Auth::user()->dateFormat($leave->end_date) }}</td>
                                    <td>{{ $leave['request_reason' . $lang] }}</td>
                                    <td class="text-center">
                                        @if ($leave->status == 0)
                                            <span class="badge bg-warning">{{ __('Pending') }}</span>
                                        @elseif ($leave->status == 1)
                                            <span class="badge bg-success">{{ __('Approve By Department Manager') }}</span>
                                        @elseif ($leave->status == 2)
                                            <span class="badge bg-danger">{{ __('Reject By Department Manager') }}</span>
                                        @elseif ($leave->status == 3)
                                            <span class="badge bg-success">{{ __('Approve By Branch Manager') }}</span>
                                        @elseif ($leave->status == 4)
                                            <span class="badge bg-danger">{{ __('Reject By Branch Manager') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($leave->status == 0)
                                            @can('Edit Leave')
                                                <a href="#" data-url="{{ URL::to('employee_requests/' . $leave->id . '/edit') }}" data-size="lg"
                                                   data-ajax-popup="true" data-title="{{ __('Edit Request') }}" class="btn btn-sm btn-success"
                                                   title="{{ __('Edit') }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                        @endif

                                        @can('Delete Leave')
                                            <button class="btn btn-sm btn-danger" title="{{ __('Delete') }}"
                                                onclick="deleteConfirmation({{ $leave->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $leave->id }}" method="POST"
                                                  action="{{ route('employee_requests.destroy', $leave->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endcan

                                        <a href="#" data-url="{{ URL::to('employee_requests/' . $leave->id . '/action') }}" data-size="lg"
                                           data-ajax-popup="true" data-title="{{ __('Request Action') }}" class="btn btn-sm btn-primary"
                                           title="{{ __('Request Action') }}">
                                            <i class="fas fa-caret-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-end mt-3">
    @if (\Auth::user()->type == 'employee')
        @can('Create Leave')
            <div class="col-auto">
                <a href="#" data-url="{{ route('employee_requests.create') }}" class="btn btn-primary"
                   data-ajax-popup="true" data-title="{{ __('Create New Request') }}">
                    <i class="fas fa-plus"></i> {{ __('Create') }}
                </a>
            </div>
        @endcan
    @endif
</div>
@endsection

@section('script')
<script>
    function deleteConfirmation(id) {
        if (confirm("{{ __('Are you sure? This action cannot be undone.') }}")) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
