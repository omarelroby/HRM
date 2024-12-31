@extends('dashboard.layouts.master')
@section('content')
    <div style="width:100%;" class="row">
        @can('Create Pay Slip')
        {{ Form::open(['route' => 'payslip.store', 'method' => 'POST', 'class' => 'w-100', 'id' => 'payslip_form']) }}
            <div class="row d-flex">
                <!-- Month Selection -->
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="all-select-box">
                        <div class="btn-box">
                            {{ Form::label('month', __('Select Month'), ['class' => 'text-type']) }}
                            {{ Form::select('month', $month, null, ['class' => 'form-control month select2']) }}
                        </div>
                    </div>
                </div>
                <!-- Year Selection -->
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="all-select-box">
                        <div class="btn-box">
                            {{ Form::label('year', __('Select Year'), ['class' => 'text-type']) }}
                            {{ Form::select('year', $year, null, ['class' => 'form-control year select2']) }}
                        </div>
                    </div>
                </div>
                <!-- Generate Payslip Button -->
                <div style="margin-top:2%;" class="col-xl-2 col-lg-2 col-md-6 col-auto text-right payslip-btn">
                    <a href="#" class="btn btn-primary btn-icon-only w-100 width-auto" onclick="document.getElementById('payslip_form').submit(); return false;">
                        {{ __('Generate Payslip') }}
                    </a>
                </div>
                <!-- Conditional Export Buttons -->
                @can('Create Pay Slip')
                    <div style="margin-top:2%;" class="col-xl-2 col-lg-2 col-md-6 col-auto text-right payslip-btn">
                        <a id="payrollexport" href="#" class="btn btn-success w-100 btn-icon-only width-auto">
                            {{ __('Export') }} <i class="fa fa-file-excel-o"></i>
                        </a>
                    </div>
                    <div style="margin-top:2%;" class="col-xl-2 col-lg-2 col-md-6 col-auto text-right payslip-btn">
                        <a id="payrollpdf" target="_blank" href="#" class="btn btn-info w-100 btn-icon-only width-auto">
                            {{ __('Monthly payroll Log') }} <i class="fa fa-file-pdf-o"></i>
                        </a>
                    </div>
                    <div style="margin-top:2%;" class="col-xl-2 col-lg-2 col-md-6 col-auto text-right payslip-btn">
                        <a id="payrollbarpdf" target="_blank" href="#" class="btn btn-info w-100 btn-icon-only width-auto">
                            {{ __('Salary Bar') }} <i class="fa fa-file-pdf-o"></i>
                        </a>
                    </div>
                @endcan
            </div>
        {{ Form::close() }}
        @endcan
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form>
                        <div class="d-flex justify-content-between w-100">
                            <h6 class="float-right col-2">{{ __('Find Employee Payslip') }}</h6>

                            <!-- Month Selection (Search Form) -->
                            <div class="float-right col-4">
                                <select class="form-control month_date select2" name="year" tabindex="-1" aria-hidden="true">
                                    <option value="--">--</option>
                                    @foreach($months as $k => $mon)
                                        <option value="{{ $k }}" @if(date("m") == $k) selected @endif>{{ $mon }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Year Selection (Search Form) -->
                            <div class="float-right col-4">
                                {{ Form::select('year', $years, date('Y'), ['class' => 'form-control year_date select2']) }}
                            </div>

                            @can('Create Pay Slip')
                                <input type="button" value="{{ __('Bulk Payment') }}" class="btn btn-primary col-2 float-right search mt-0" id="bulk_payment">
                            @endcan

                        </div>
                    </form>
                </div>

                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table id="payslipTable" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Id') }}</th>
                                            <th>{{ __('Employee Id') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Payroll Type') }}</th>
                                            <th>{{ __('Salary') }}</th>
                                            <th>{{ __('Net Salary') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> <!-- DataTables -->
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> <!-- DataTables with Bootstrap 5 -->

<script type="text/javascript">
    $(document).ready(function () {
        // Ensure the table exists before initializing
        if ($('#payslipTable').length) {
            var table = $('#payslipTable').DataTable({
                "aoColumnDefs": [
                    {
                        "aTargets": [6],
                        "mData": null,
                        "mRender": function (data, type, full) {
                            var month = $(".month_date").val();
                            var year  = $(".year_date").val();
                            var datePicker = year + '-' + month;

                            if (data[6] === 'Paid')
                                return '<div class="badge badge-pill badge-success"><a href="#" class="text-white">' + data[6] + '</a></div>';
                            else
                                return '<div class="badge badge-pill badge-danger"><a href="#" class="text-white">' + data[6] + '</a></div>';
                        }
                    },
                    {
                        "aTargets": [7],
                        "mData": null,
                        "mRender": function (data, type, full) {
                            var month = $(".month_date").val();
                            var year = $(".year_date").val();
                            var datePicker = year + '-' + month;

                            var id = data[0];
                            var payslip_id = data[7];
                            var view = '';
                            var edit = '';
                            var deleteAction = '';
                            var payslip = '';
                            var employee_receipt = '';

                            // Generate links based on status
                            if(data[6] != 0) {
                                payslip = '<a href="#" data-url="{{ url('payslip/pdf/') }}/' + id + '/' + datePicker + '" data-size="md-pdf" data-ajax-popup="true" class="btn yellow-bg" data-title="{{ __('Employee Payslip') }}">{{ __('Payslip') }}</a> ';
                            }

                            if (data[6] === "UnPaid" && data[7] !== 0) {
                                edit = '<a href="{{ url('payslip/editemployee/') }}/' + payslip_id + '" data-ajax-popup="true" class="btn blue-bg" data-title="{{ __('Edit Employee salary') }}">{{ __('Edit') }}</a>';
                            }

                            employee_receipt = '<a target="_blank" href="{{ url('payslip/employeePayrollbarpdf/') }}/' + payslip_id + '/' + month + '/' + year + '" class="btn btn-success">{{ __('Salary Receipt') }}</a>';

                            // Delete action only for non-employee types
                            @if(\Auth::user()->type !== 'employee')
                                if (data[7] !== 0) {
                                    deleteAction = '<a href="#" data-url="{{ route("payslip.delete", ":id") }}".replace(":id", payslip_id) class="payslip_delete btn red-bg">{{ __('Delete') }}</a>';
                                }
                            @endif

                            return view + payslip + edit + deleteAction + employee_receipt;
                        }
                    }
                ]
            });
        }

        // Callback function to handle dynamic updates based on month and year
        function callback() {
            var month = $(".month_date").val();
            var year = $(".year_date").val();
            var datePicker = year + '-' + month;

            // Update URLs for export options
            $('#payrollexport').attr('href', '{{ route('payslip.exportExcel', ['monthValue', 'yearValue']) }}'.replace('monthValue', month).replace('yearValue', year));
            $('#payrollpdf').attr('href', '{{ route('payslip.Payrollpdf', ['monthValue', 'yearValue']) }}'.replace('monthValue', month).replace('yearValue', year));
            $('#payrollbarpdf').attr('href', '{{ route('payslip.Payrollbarpdf', ['monthValue', 'yearValue']) }}'.replace('monthValue', month).replace('yearValue', year));

            // Perform an AJAX request to fetch data and update the table
            $.ajax({
                url: '{{ route('payslip.search_json') }}',
                type: 'POST',
                data: { "datePicker": datePicker, "_token": "{{ csrf_token() }}" },
                success: function (data) {
                    // Check if the table is initialized before performing any actions
                    if ($('#payslipTable').length) {
                        table.clear().rows.add(data).draw();
                        table.column(0).visible(false);
                        $('[data-toggle="tooltip"]').tooltip();

                        if (!data.length) {
                            show_toastr('error', 'Employee payslip not found! Please generate it first.', 'error');
                        }
                    }
                },
                error: function () {
                    show_toastr('error', 'An error occurred while fetching data.', 'error');
                }
            });
        }

        // Trigger callback when month or year changes
        $(document).on("change", ".month_date,.year_date", function () {
            callback();
        });

        // Initial table load
        callback();
    });
</script>
@endsection
