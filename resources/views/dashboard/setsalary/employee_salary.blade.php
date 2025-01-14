@extends('dashboard.layouts.master')
@extends('dashboard.layouts.header')

@section('page-title')
    {{__('Employee Set Salary')}} - <b>{{$employee->name}}</b>
@endsection
<style>
    .col-md-6{
        margin-bottom: 2%;
    }
</style>

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="col-md-12">
                    <h3> {{$employee->name}} </h3>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">


                <div class="col-md-6">
                    <div class="card min-height-253">
                        <div class="card-header">

                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Employee Salary')}}</h6>
                                </div>
                                @can('Create Set Salary')
                                    <div class="col text-right">
                                        <a href="#"
                                           data-url="{{ route('employee.basic.salary', $employee->id) }}"
                                           data-size="md"
                                           data-ajax-popup="true"
                                           data-title="{{ __('Set Basic Salary') }}"
                                           data-toggle="tooltip"
                                           data-original-title="{{ __('Basic Salary') }}"
                                           class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                @endcan

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="project-info d-flex text-sm">
{{--                                <div class="project-info-inner mr-3 col-6">--}}
{{--                                    <b class="m-0"> {{__('Payslip Type') }} </b>--}}
{{--                                    <div class="project-amnt pt-1">{{ $employee->salary_type() }}</div>--}}
{{--                                </div>--}}
                                <div class="project-info-inner mr-3 col-6">
                                    <b class="m-0"> {{__('Salary') }} </b>
                                    <div class="project-amnt pt-1">{{ number_format($employee->salary,2)  ??0 }} SAR</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card min-height-253">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('social_insurance')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="project-info d-flex text-sm">
                                <div class="project-info-inner mr-3 col-6">
                                    <b class="m-0"> {{__('on_employee') }} </b>
                                    <div class="project-amnt pt-1"> {{  \Auth::user()->priceFormat($employee->insurance($employee->id,'employee'))}} </div>
                                </div>
                                <div class="project-info-inner mr-3 col-6">
                                    <b class="m-0"> {{__('on_company') }} </b>
                                    <div class="project-amnt pt-1">{{  \Auth::user()->priceFormat($employee->insurance($employee->id,'company'))}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card min-height-253">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Medical_insurance')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="project-info d-flex text-sm">
                                <div class="project-info-inner mr-3 col-6">
                                    <b class="m-0"> {{__('on_employee') }} </b>
                                    <div class="project-amnt pt-1"> {{  \Auth::user()->priceFormat($employee->medical_insurance($employee->id,'employee'))}} </div>
                                </div>
                                <div class="project-info-inner mr-3 col-6">
                                    <b class="m-0"> {{__('on_company') }} </b>
                                    <div class="project-amnt pt-1">{{  \Auth::user()->priceFormat($employee->medical_insurance($employee->id,'company'))}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Delays --}}
                <div class="col-md-6">
                    <div class="card min-height-253">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Delays')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="project-info d-flex text-sm">

                                <div class="project-info-inner mr-3 col-3">
                                    <b class="m-0"> 0 - 15 m </b>
                                    <div class="project-amnt pt-1"> {{$employee->getEmployeeDelays(0 , 15)}} </div>
                                </div>

                                <div class="project-info-inner mr-3 col-3">
                                    <b class="m-0"> 16 - 30 m </b>
                                    <div class="project-amnt pt-1"> {{$employee->getEmployeeDelays(16 , 30)}} </div>
                                </div>

                                <div class="project-info-inner mr-3 col-3">
                                    <b class="m-0"> 31 - 60 m </b>
                                    <div class="project-amnt pt-1"> {{$employee->getEmployeeDelays(31 , 60)}} </div>
                                </div>

                                <div class="project-info-inner mr-3 col-3">
                                    <b class="m-0"> 61 - ... m </b>
                                    <div class="project-amnt pt-1"> {{$employee->getEmployeeDelays(61 , null)}} </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- overtime --}}
                <div class="col-md-6">
                    <div class="card min-height-253">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Attendance OverTime')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="project-info d-flex text-sm">

                                <div class="project-info-inner mr-3 col-3">
                                    <b class="m-0"> 0 - 15 m </b>
                                    <div class="project-amnt pt-1"> {{$employee->getEmployeeOverTimes(0 , 15)}} </div>
                                </div>

                                <div class="project-info-inner mr-3 col-3">
                                    <b class="m-0"> 16 - 30 m </b>
                                    <div class="project-amnt pt-1"> {{$employee->getEmployeeOverTimes(16 , 30)}} </div>
                                </div>

                                <div class="project-info-inner mr-3 col-3">
                                    <b class="m-0"> 31 - 60 m </b>
                                    <div class="project-amnt pt-1"> {{$employee->getEmployeeOverTimes(31 , 60)}} </div>
                                </div>

                                <div class="project-info-inner mr-3 col-3">
                                    <b class="m-0"> 61 - ... m </b>
                                    <div class="project-amnt pt-1"> {{$employee->getEmployeeOverTimes(61 , null)}} </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Allowance')}}</h6>
                                </div>
                                @can('Create Allowance')
                                    <div class="col text-right">
                                        <a href="#" data-url="{{ route('allowances.create',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create Allowance')}}" data-toggle="tooltip" data-original-title="{{__('Create Allowance')}}" class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Employee Name')}}</th>
                                    <th>{{__('Allownace Option')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($allowances as $allowance)
                                    <tr>
                                        <td>{{ !empty($allowance->employee())?$allowance->employee()->name:'' }}</td>
                                        <td>{{ !empty($allowance->allowance_option())?$allowance->allowance_option()->name:'' }}</td>
                                        <td>{{ $allowance->title }}</td>
                                        <td>{{  \Auth::user()->priceFormat($allowance->amount) }}</td>
                                        <td>


                                            @can('Delete Allowance')
                                                <form method="POST" action="{{ route('allowance.destroy', $allowance->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Commission')}}</h6>
                                </div>
                                @can('Create Commission')
                                    <div class="col text-right">
                                        <a href="#" data-url="{{ route('commissions.create',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create Commission')}}" data-toggle="tooltip" data-original-title="{{__('Create Commission')}}" class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Employee Name')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($commissions as $commission)
                                    <tr>
                                        <td>{{ !empty($commission->employee())?$commission->employee()->name:'' }}</td>
                                        <td>{{ $commission->title }}</td>
                                        <td>{{ $commission->amount }} {{$commission->type}}</td>
                                        <td class="text-right">

                                            @can('Delete Commission')
                                                <form method="POST" action="{{ route('commission.destroy', $commission->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Loan')}}</h6>
                                </div>
                                @can('Create Loan')
                                    <div class="col text-right">
                                        <a href="#" data-url="{{ route('loans.create',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create Loan')}}" data-toggle="tooltip" data-original-title="{{__('Create Loan')}}" class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Employee')}}</th>
                                    <th>{{__('Loan Options')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Loan Amount')}}</th>
                                    <th>{{__('Start Date')}}</th>
                                    <th>{{__('End Date')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td>{{ !empty($loan->employee())?$loan->employee()->name:'' }}</td>
                                        <td>{{!empty( $loan->loan_option())? $loan->loan_option()->name:'' }}</td>
                                        <td>{{ $loan->title }}</td>
                                        <td>{{  \Auth::user()->priceFormat($loan->amount) }}</td>
                                        <td>{{  \Auth::user()->dateFormat($loan->start_date) }}</td>
                                        <td>{{ \Auth::user()->dateFormat( $loan->end_date) }}</td>
                                        <td class="text-right">

                                            @can('Delete Loan')
                                                <form method="POST" action="{{ route('loan.destroy', $loan->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Saturation Deduction')}}</h6>
                                </div>
                                @can('Create Saturation Deduction')
                                    <div class="col text-right">
                                        <a href="#" data-url="{{ route('saturationdeductions.create',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create Saturation Deduction')}}" data-toggle="tooltip" data-original-title="{{__('Create Saturation Deduction')}}" class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Employee Name')}}</th>
                                    <th>{{__('Deduction Option')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($saturationdeductions as $saturationdeduction)
                                    <tr>
                                        <td>{{ !empty($saturationdeduction->employee())?$saturationdeduction->employee()->name:'' }}</td>
                                        <td>{{ !empty($saturationdeduction->deduction_option())?$saturationdeduction->deduction_option()->name:'' }}</td>
                                        <td>{{ $saturationdeduction->title }}</td>
                                        <td>{{ \Auth::user()->priceFormat( $saturationdeduction->amount) }}</td>
                                        <td class="text-right">
                                            @can('Delete Saturation Deduction')
                                                <form method="POST" action="{{ route('saturationdeduction.destroy', $saturationdeduction->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Other Payment')}}</h6>
                                </div>
                                @can('Create Other Payment')
                                    <div class="col text-right">
                                        <a href="#" data-url="{{ route('otherpayments.create',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create Other Payment')}}" data-toggle="tooltip" data-original-title="{{__('Create Other Payment')}}" class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Employee')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($otherpayments as $otherpayment)
                                    <tr>
                                        <td>{{ !empty($otherpayment->employee())?$otherpayment->employee()->name:'' }}</td>
                                        <td>{{ $otherpayment->title }}</td>
                                        <td>{{  \Auth::user()->priceFormat($otherpayment->amount) }}</td>
                                        <td class="text-right">

                                            @can('Delete Other Payment')
                                                <form method="POST" action="{{ route('otherpayment.destroy', $otherpayment->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Overtime')}}</h6>
                                </div>
                                @can('Create Overtime')
                                    <div class="col text-right">
                                        <a href="#" data-url="{{ route('overtimes.create',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create Overtime')}}" data-toggle="tooltip" data-original-title="{{__('Create Overtime')}}" class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                @endcan

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Employee Name')}}</th>
                                    <th>{{__('Overtime Title')}}</th>
                                    <th>{{__('Number of days')}}</th>
                                    <th>{{__('Hours')}}</th>
                                    <th>{{__('Rate')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($overtimes as $overtime)
                                    <tr>
                                        <td>{{ !empty($overtime->employee())?$overtime->employee()->name:'' }}</td>
                                        <td>{{ $overtime->title }}</td>
                                        <td>{{ $overtime->number_of_days }}</td>
                                        <td>{{ $overtime->hours }}</td>
                                        <td>{{  \Auth::user()->priceFormat($overtime->rate) }}</td>
                                        <td class="text-right">

                                            @can('Delete Overtime')
                                                <form method="POST" action="{{ route('overtime.destroy', $overtime->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">{{__('Absences')}}</h6>
                                </div>
                                @can('Create Overtime')
                                    <div class="col text-right">
                                        <a href="#" data-url="{{ route('absences.create',$employee->id) }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create absence')}}" data-toggle="tooltip" data-original-title="{{__('Create absence')}}" class="btn btn-info">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('Employee Name')}}</th>
                                    <th>{{__('Absent Type')}}</th>
                                    <th>{{__('Number of days')}}</th>
                                    <th>{{__('Start Date')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($absences as $absence)
                                    <tr>
                                        <td>{{ !empty($absence->employee())?$absence->employee()->name:'' }}</td>
                                        <td>{{ $absence->type }}</td>
                                        <td>{{ $absence->number_of_days }}</td>
                                        <td>{{ $absence->start_date }}</td>
                                        <td class="text-right">

                                            @can('Delete Overtime')
                                                <form method="POST" action="{{ route('absence.destroy', $absence->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
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
    </div>
    <div class="modal fade" id="dynamicModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamicModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>




    $(document).ready(function () {
    var d_id = $('#department_id').val();
    var designation_id = '{{ $employee->designation_id }}';
    getDesignation(d_id);


    $("#allowance-dataTable").dataTable({
        "columnDefs": [
            {"sortable": false, "targets": [1]}
        ]
    });

    $("#commission-dataTable").dataTable({
        "columnDefs": [
            {"sortable": false, "targets": [1]}
        ]
    });

    $("#loan-dataTable").dataTable({
        "columnDefs": [
            {"sortable": false, "targets": [1]}
        ]
    });

    $("#saturation-deduction-dataTable").dataTable({
        "columnDefs": [
            {"sortable": false, "targets": [1]}
        ]
    });

    $("#other-payment-dataTable").dataTable({
        "columnDefs": [
            {"sortable": false, "targets": [1]}
        ]
    });

    $("#overtime-dataTable").dataTable({
        "columnDefs": [
            {"sortable": false, "targets": [1]}
        ]
    });
    });
    $(document).on('change', 'select[name=department_id]', function () {
    var department_id = $(this).val();
    getDesignation(department_id);
    });
    function getDesignation(did) {
    $.ajax({
        url: '{{route('employee.json')}}',
        type: 'POST',
        data: {
            "department_id": did, "_token": "{{ csrf_token() }}",
        },
        success: function (data) {
            $('#designation_id').empty();
            $('#designation_id').append('<option value="">{{__('Select any Designation')}}</option>');
            $.each(data, function (key, value) {
                var select = '';
                if (key == '{{ $employee->designation_id }}') {
                    select = 'selected';
                }

                $('#designation_id').append('<option value="' + key + '"  ' + select + '>' + value + '</option>');
            });
        }
    });
    }
    function calculateOvertimeRate(emp_id) {
    $.ajax({
        url : '{{route('overtimes.calculateOvertime')}}',
        type: 'POST',
        data: {
            "_token"      : "{{ csrf_token() }}",
            "employee_id" : emp_id,
            "hours"       : $('#hours').val(),
        },
        success: function (data) {
            $('#rate').val(data);
        }
    });
    }

    // Event delegation for dynamic elements
        $(document).ready(function () {
            // When the button is clicked
            $('#loadData').on('click', function () {
                // Make an AJAX GET request
                $.ajax({
                    url: '/get-income-data', // Replace with your route or API endpoint
                    method: 'GET',
                    success: function (response) {
                        // Update the #incomeContainer with the fetched data
                        $('#incomeContainer').html(response);
                    },
                    error: function (xhr) {
                        // Handle errors
                        console.error('Error fetching data:', xhr);
                        $('#incomeContainer').html('<p class="text-danger">Failed to load data. Please try again.</p>');
                    }
                });
            });
        });


    $(document).ready(function () {
        $(document).on('click', '[data-ajax-popup="true"]', function (e) {
            e.preventDefault();

            // Get attributes from the clicked element
            const url = $(this).data('url'); // Fetch the route with the employee ID
            const title = $(this).data('title'); // Modal title
            const size = $(this).data('size') || 'modal-lg'; // Modal size, default to 'modal-lg'

            // Check if the modal exists; if not, create it dynamically
            if (!$('#dynamicModal').length) {
                $('body').append(`
                <div class="modal fade" id="dynamicModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalLabel" aria-hidden="true">
                    <div class="modal-dialog ${size}" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dynamicModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body"></div>
                        </div>
                    </div>
                </div>
            `);
            }

            // Set the modal title
            $('#dynamicModalLabel').text(title);


            $.ajax({
                url: url, // The route with the employee ID
                method: 'GET',
                success: function (response) {
                    // Inject the response into the modal body
                    $('#dynamicModal .modal-body').html(response);

                    // Show the modal
                    $('#dynamicModal').modal('show');
                },
                error: function (xhr) {

                    console.log(  xhr);
                 }
            });
        });
    });




</script>
@endsection
