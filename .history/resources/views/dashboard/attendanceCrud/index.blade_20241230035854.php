@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Attendance List') }}
@endsection

@push('script-page')
<script>
    $(document).ready(function () {
        $('input[name="type"]:radio').on('change', function () {
            var type = $(this).val();
            if (type == 'monthly') {
                $('.month').removeClass('d-none').addClass('d-block');
                $('.date').removeClass('d-block').addClass('d-none');
            } else {
                $('.date').removeClass('d-none').addClass('d-block');
                $('.month').removeClass('d-block').addClass('d-none');
            }
        });

        $('input[name="type"]:radio:checked').trigger('change');
    });
</script>
@endpush

@section('content')
<div class="row">
    <!-- Filter Section -->
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Attendance Filters') }}</h5>
            </div>
            <div class="card-body">
                {{ Form::open(array('route' => array('attendanceemployee.index'),'method'=>'get','id'=>'attendanceemployee_filter')) }}
                    <div class="row d-flex justify-content-end mt-2">
                        <div class="col-auto">
                            <div class="all-select-box">
                                <div class="btn-box">
                                    <label class="text-type">{{__('Type')}}</label> <br>
                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="monthly" value="monthly" name="type" class="custom-control-input" {{isset($_GET['type']) && $_GET['type']=='monthly' ?'checked':'checked'}}>
                                            <label class="custom-control-label" for="monthly">{{__('Monthly')}}</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="daily" value="daily" name="type" class="custom-control-input" {{isset($_GET['type']) && $_GET['type']=='daily' ?'checked':''}}>
                                            <label class="custom-control-label" for="daily">{{__('Daily')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto month">
                            <div class="all-select-box">
                                <div class="btn-box">
                                    {{Form::label('month',__('Month'),['class'=>'text-type'])}}
                                    {{Form::month('month',isset($_GET['month'])?$_GET['month']:date('Y-m'),array('class'=>'month-btn form-control month-btn'))}}
                                </div>
                            </div>
                        </div>
                        <div class="col-auto date">
                            <div class="all-select-box">
                                <div class="btn-box">
                                    {{ Form::label('date', __('Date'),['class'=>'text-type'])}}
                                    {{ Form::text('date',isset($_GET['date'])?$_GET['date']:'', array('class' => 'form-control gregorian-date month-btn')) }}
                                </div>
                            </div>
                        </div>
                        @if(\Auth::user()->type != 'employee')
                            <div class="col-xl-2 col-lg-3">
                                <div class="all-select-box">
                                    <div class="btn-box">
                                        {{ Form::label('branch', __('Branch'),['class'=>'text-type'])}}
                                        {{ Form::select('branch', $branch,isset($_GET['branch'])?$_GET['branch']:'', array('class' => 'form-control select2')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3">
                                <div class="all-select-box">
                                    <div class="btn-box">
                                        {{ Form::label('department', __('Department'),['class'=>'text-type'])}}
                                        {{ Form::select('department', $department,isset($_GET['department'])?$_GET['department']:'', array('class' => 'form-control select2')) }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-auto mt-auto mb-3">
                            <a href="#" class="apply-btn btn btn-primary mt-4" onclick="document.getElementById('attendanceemployee_filter').submit(); return false;">
                                <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                            </a>
                            <a href="{{route('attendanceemployee.index')}}" class="reset-btn btn btn-danger mt-4">
                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                            </a>
                        </div>
                    </div>
                    {{ Form::close() }}

            </div>
        </div>
    </div>
</div>

<!-- Attendance Table Section -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ __('Attendance List') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                @if (\Auth::user()->type != 'employee')
                                <th>{{ __('Employee') }}</th>
                                @endif
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Clock In') }}</th>
                                <th>{{ __('Clock Out') }}</th>
                                <th>{{ __('Late') }}</th>
                                <th>{{ __('Early Leaving') }}</th>
                                <th>{{ __('Overtime') }}</th>
                                @if (Gate::check('Edit Attendance') || Gate::check('Delete Attendance'))
                                <th>{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendanceEmployee as $attendance)
                            <tr>
                                @if (\Auth::user()->type != 'employee')
                                <td>{{ $attendance->employee->name ?? '' }}</td>
                                @endif
                                <td>{{ \Auth::user()->dateFormat($attendance->date) }}</td>
                                <td>{{ $attendance->status }}</td>
                                <td>{{ $attendance->clock_in != '00:00:00' ? \Auth::user()->timeFormat($attendance->clock_in) : '00:00' }}</td>
                                <td>{{ $attendance->clock_out != '00:00:00' ? \Auth::user()->timeFormat($attendance->clock_out) : '00:00' }}</td>
                                <td>{{ $attendance->late }}</td>
                                <td>{{ $attendance->early_leaving }}</td>
                                <td>{{ $attendance->overtime }}</td>
                                @if (Gate::check('Edit Attendance') || Gate::check('Delete Attendance'))
                                <td class="text-center">
                                    @can('Edit Attendance')
                                    <a href="#" data-url="{{ URL::to('attendanceemployee/' . $attendance->id . '/edit') }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('Delete Attendance')
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal" data-url="{{ route('attendanceemployee.destroy', $attendance->id) }}" title="{{ __('Delete') }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{ $attendance->id }}" action="{{ route('attendanceemployee.destroy', $attendance->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcan
                                </td>
                                @endif
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