@extends('dashboard.layouts.master')

@section('content')
    <div class="container-fluid">
        @can('Create Pay Slip')
        {{ Form::open(['route' => 'payslip.store', 'method' => 'POST', 'class' => 'w-100', 'id' => 'payslip_form']) }}
        <div class="row mb-4">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="form-group">
                    {{ Form::label('month', __('Select Month'), ['class' => 'form-label']) }}
                    {{ Form::select('month', $month, null, ['class' => 'form-control select2', 'placeholder' => 'Select Month']) }}
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="form-group">
                    {{ Form::label('year', __('Select Year'), ['class' => 'form-label']) }}
                    {{ Form::select('year', $year, null, ['class' => 'form-control select2', 'placeholder' => 'Select Year']) }}
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-center">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-file-text-o"></i> {{ __('Generate Payslip') }}
                </button>
            </div>

            @can('Create Pay Slip')
            <div class="col-xl-3 col-lg-4 col-md-6 d-flex align-items-center">
                <div class="d-flex gap-2">
                    <a id="payrollexport" href="#" class="btn btn-success">
                        {{ __('Export') }} <i class="fa fa-file-excel-o"></i>
                    </a>
                    <a id="payrollpdf" target="_blank" href="#" class="btn btn-info">
                        {{ __('Monthly payroll Log') }} <i class="fa fa-file-pdf-o"></i>
                    </a>
                    <a id="payrollbarpdf" target="_blank" href="#" class="btn btn-info">
                        {{ __('Salary Bar') }} <i class="fa fa-file-pdf-o"></i>
                    </a>
                </div>
            </div>
            @endcan
        </div>
        {{ Form::close() }}
        @endcan

        <!-- Search and Filter Section -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{ __('Find Employee Payslip') }}</h5>

                <form class="d-flex gap-3">
                    <div class="form-group w-50">
                        <select class="form-control select2 month_date" name="month" aria-label="{{ __('Select Month') }}">
                            <option value="--">--</option>
                            @foreach($months as $k => $mon)
                                <option value="{{ $k }}" @if(date("m") == $k) selected @endif>{{ $mon }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group w-50">
                        {{ Form::select('year', $years, date('Y'), ['class' => 'form-control select2 year_date', 'aria-label' => __('Select Year')]) }}
                    </div>

                    @can('Create Pay Slip')
                    <button type="button" class="btn btn-primary" id="bulk_payment">
                        {{ __('Bulk Payment') }}
                    </button>
                    @endcan
                </form>
            </div>
        </div>

        <!-- Payslip Table -->
        <div class="card">
            <div class="card-body">
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
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> <!-- DataTables with Bootstrap 5 -->

    <script type="text/javascript">
      $(document).ready(function () {
    var table = $('#payslipTable').DataTable({
        "aoColumnDefs": [
            {
                "aTargets": [6],
                "mData": null,
                "mRender": function (data, type, full) {
                    var month = $(".month_date").val();
                    var year  = $(".year_date").val();
                    var datePicker = year + '-' + month;

                    // Check the status and render accordingly
                    if (data[6] === 'Paid') {
                        return '<span class="badge bg-success">' + data[6] + '</span>';
                    } else if (data[6] === 'UnPaid') {
                        return '<span class="badge bg-danger">' + data[6] + '</span>';
                    } else {
                        return '<span class="badge bg-warning">Pending</span>';
                    }
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
                    var actions = '';
                    var payslip = '';

                    // Check if status is not 0 (UnPaid) and render the Payslip link
                    if (data[6] !== 0) {
                        payslip = '<a href="#" class="btn btn-warning btn-sm" data-url="{{ url('payslip/pdf/') }}/' + id + '/' + datePicker + '" data-ajax-popup="true">{{ __('Payslip') }}</a>';
                    }

                    // Show the edit button only if the payslip is UnPaid
                    if (data[6] === "UnPaid" && data[7] !== 0) {
                        actions += '<a href="{{ url('payslip/editemployee/') }}/' + payslip_id + '" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>';
                    }

                    actions += '<a href="{{ url('payslip/employeePayrollbarpdf/') }}/' + payslip_id + '/' + month + '/' + year + '" class="btn btn-success btn-sm" target="_blank">{{ __('Salary Receipt') }}</a>';

                    // Delete action (if the user is not an employee)
                    @if(\Auth::user()->type !== 'employee')
                        actions += '<a href="#" data-url="{{ route("payslip.delete", ":id") }}".replace(":id", payslip_id) class="btn btn-danger btn-sm payslip_delete">{{ __('Delete') }}</a>';
                    @endif

                    return payslip + actions;
                }
            }
        ]
    });

    // Function to dynamically update the table data based on month/year
    function updateTableData() {
        var month = $(".month_date").val();
        var year = $(".year_date").val();
        var datePicker = year + '-' + month;

        // Update export URLs
        $('#payrollexport').attr('href', '{{ route('payslip.exportExcel', ['monthValue', 'yearValue']) }}'.replace('monthValue', month).replace('yearValue', year));
        $('#payrollpdf').attr('href', '{{ route('payslip.Payrollpdf', ['monthValue', 'yearValue']) }}'.replace('monthValue', month).replace('yearValue', year));
        $('#payrollbarpdf').attr('href', '{{ route('payslip.Payrollbarpdf', ['monthValue', 'yearValue']) }}'.replace('monthValue', month).replace('yearValue', year));

        $.ajax({
            url: '{{ route('payslip.search_json') }}',
            type: 'POST',
            data: { "datePicker": datePicker, "_token": "{{ csrf_token() }}" },
            success: function (data) {
                table.clear().rows.add(data).draw();
                table.column(0).visible(false);

                if (!data.length) {
                    show_toastr('error', 'Employee payslip not found! Please generate it first.', 'error');
                }
            },
            error: function () {
                show_toastr('error', 'An error occurred while fetching data.', 'error');
            }
        });
    }

    // Call update function on month/year change
    $(document).on("change", ".month_date,.year_date", function () {
        updateTableData();
    });

    // Initial load of the table data
    updateTableData();

    // Handle delete action
    $(document).on("click", ".payslip_delete", function () {
        if (confirm("Are you sure you want to delete this payslip?")) {
            var url = $(this).data('url');
            $.ajax({
                type: "GET",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.success) {
                        show_toastr('success', 'Payslip deleted successfully.', 'success');
                        updateTableData();
                    } else {
                        show_toastr('error', 'Error occurred while deleting the payslip.', 'error');
                    }
                },
                error: function() {
                    show_toastr('error', 'Error occurred while processing your request.', 'error');
                }
            });
        }
    });
});

    </script>
@endsection
