@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Employee Request') }}
@endsection

@section('content')
<div class="row">
    <div class="row d-flex justify-content-end mt-3">
        @if (\Auth::user()->type == 'employee')
            @can('Create Leave')
                <div class="col-auto">
                    <a   class="btn btn-primary"
                       data-bs-toggle="modal" data-bs-target="#addTrainingModal" data-title="{{ __('Create New Request') }}">
                        <i class="fas fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        @endif
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ __('Employee Requests') }}</h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif
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
                                    <td>{{ $leave->requestType['name' . $lang] ?? '' }}</td>
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
                                                <a href="{{ URL::to('employee_requests/' . $leave->id . '/edit') }}"   data-size="lg"
                                                     data-title="{{ __('Edit Request') }}" class="btn btn-sm btn-success"
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
{{--
                                        <a href="#" data-url="{{ URL::to('employee_requests/' . $leave->id . '/action') }}" data-size="lg"
                                           data-ajax-popup="true" data-title="{{ __('Request Action') }}" class="btn btn-sm btn-primary"
                                           title="{{ __('Request Action') }}">
                                            <i class="fas fa-caret-right"></i>
                                        </a> --}}
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
                <div class="card bg-none card-box">
                    {{Form::open(array('url'=>'employee_requests','method'=>'post'))}}
                    @if($employeeId) {{ Form::hidden('employee_id',$employeeId, array()) }} @endif
                    @if(\Auth::user()->type !='employee')
                        @if(!$employeeId)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{Form::label('employee_id',__('Employee'))}}
                                        {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','id'=>'employee_id','placeholder'=>__('Select Employee')))}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('request_type_id',__('Request_type'))}}
                                <select name="request_type_id" id="request_type_id" class="form-control select2">
                                    @foreach($requesttypes as $requesttype)
                                        <option value="{{ $requesttype->id }}">{{$requesttype['name'.$lang]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('start_date',__('Start Date'))}}
                                {{Form::date('start_date',null,array('class'=>'form-control   datepicker'))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('end_date',__('End Date'))}}
                                {{Form::date('end_date',null,array('class'=>'form-control gregorian-date datepicker'))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('request_reason',__('Request Reason'))}}
                                {{Form::textarea('request_reason',null,array('class'=>'form-control','placeholder'=>__('Request Reason')))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('request_reason_ar',__('Request Reason ar'))}}
                                {{Form::textarea('request_reason_ar',null,array('class'=>'form-control','placeholder'=>__('Request Reason ar')))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-bs-dismiss="modal">
                        </div>
                    </div>

                    {{Form::close()}}
                </div>



            </div>
        </div>
    </div>
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
@endsection
