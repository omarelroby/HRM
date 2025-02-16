@extends('dashboard.layouts.master')

@section('content')
    <!-- Common Modal -->
    <div id="commonModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                    <a id="payrollexport" href="#" class="btn btn-outline-success">
                        {{ __('Export') }} <i class="fa fa-file-excel-o"></i>
                    </a>
                    <a id="payrollpdf" target="_blank" href="#" class="btn btn-outline-info">
                        {{ __('Monthly Payroll Log') }} <i class="fa fa-file-pdf-o"></i>
                    </a>
                    <a id="payrollbarpdf" target="_blank" href="#" class="btn btn-outline-info">
                        {{ __('Salary Bar') }} <i class="fa fa-file-pdf-o"></i>
                    </a>
                </div>
            </div>
            @endcan
        </div>
        {{ Form::close() }}
        @endcan
        <div class="modal fade" id="dynamicModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dynamicModalLabel">Modal Title</h5>
                    </div>
                    <div class="modal-body">
                        Modal content goes here.
                    </div>
                </div>
            </div>
        </div>
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
                    <button type="button" class="btn btn-outline-primary" id="bulk_payment">
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
    $(document).on('click', '[data-ajax-popup="true"]', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var title = $(this).data('title');
            var modalSize = 'modal-lg';

            // Update modal size
            $('#dynamicModal .modal-dialog').attr('class', 'modal-dialog ' + modalSize);
            $('#dynamicModalLabel').text(title);

            // Load content via AJAX
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    $('#dynamicModal .modal-body').html(response);
                    $('#dynamicModal').modal('show');
                },
                error: function () {
                    alert('Failed to load content.');
                }
            });
        });
        $(document).ready(function () {
            var table = $('#payslipTable').DataTable({
                "aoColumnDefs": [
                    {
                        "aTargets": [6],
                        "mData": null,
                        "mRender": function (data, type, full) {
                            var month = $(".month_date").val();
                            var year = $(".year_date").val();
                            var datePicker = year + '-' + month;
                            var id = data[0];

                            if (data[6] == 'Paid')
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

                            var actions = '';
                            if(data[6] != 0) {
                                actions += '<a href="#" data-url="{{ url('payslip/pdf/') }}/' + id + '/' + datePicker + '" class="btn btn-warning btn-sm" data-ajax-popup="true" data-title="{{__('Employee Payslip')}}">{{__('Payslip')}}</a> ';
                            }

                            if (data[6] == "UnPaid" && data[7] != 0) {
                                actions += '<a href="{{ url('payslip/paysalary/') }}/' + id + '/' + datePicker + '" class="btn btn-success btn-sm">{{__('Click To Paid')}}</a> ';
                            }

                            if (data[7] != 0) {
                                actions += '<a href="#" data-url="{{ url('payslip/showemployee/') }}/' + payslip_id + '" data-ajax-popup="true" class="btn btn-info btn-sm" data-title="{{__('View Employee Detail')}}">{{__('View')}}</a>';
                            }

                            if (data[7] != 0 && data[6] == "UnPaid") {
                                actions += '<a href="#" data-url="{{ url('payslip/editemployee/') }}/' + payslip_id + '" data-ajax-popup="true" class="btn btn-primary btn-sm" data-title="{{__('Edit Employee salary')}}">{{__('Edit')}}</a>';
                            }

                            actions += '<a target="_blank" href="{{ url('payslip/employeePayrollbarpdf/') }}/' + payslip_id + '/' + month + '/' + year + '" class="btn btn-secondary btn-sm">{{__('Salary Receipt')}}</a>';

                            var url = '{{ route("payslip.delete", ":id") }}';
                            url = url.replace(':id', payslip_id);

                            @if(\Auth::user()->type != 'employee')
                            if (data[7] != 0) {
                                actions += '<a href="#" data-url="' + url + '" class="payslip_delete btn btn-danger btn-sm">{{__('Delete')}}</a>';
                            }
                            @endif

                            return actions;
                        }
                    },
                ]
            });

            function callback() {
                var month = $(".month_date").val();
                var year = $(".year_date").val();
                var datePicker = year + '-' + month;
                var route = "{{ route('payslip.exportExcel',['monthValue','yaerValue']) }}";
                var url = route.replace('monthValue', month).replace('yaerValue', year);
                $('#payrollexport').attr('href', url);

                var route2 = "{{ route('payslip.Payrollpdf',['monthValue','yaerValue']) }}";
                var url2 = route2.replace('monthValue', month).replace('yaerValue', year);
                $('#payrollpdf').attr('href', url2);

                var route3 = "{{ route('payslip.Payrollbarpdf',['monthValue','yaerValue']) }}";
                var url3 = route3.replace('monthValue', month).replace('yaerValue', year);
                $('#payrollbarpdf').attr('href', url3);

                $.ajax({
                    url: '{{ route('payslip.search_json') }}',
                    type: 'POST',
                    data: {
                        "datePicker": datePicker, "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        table.rows().remove().draw();
                        table.rows.add(data).draw();
                        table.column(0).visible(false);
                        $('[data-toggle="tooltip"]').tooltip();

                        if (!(data)) {
                            show_toastr('error', 'Employee payslip not found! Please generate first.', 'error');
                        }
                    },
                    error: function (data) {
                        show_toastr('error', 'Error occurred while fetching data!', 'error');
                    }
                });
            }

            callback();

            $(document).on("change", ".month_date, .year_date", function () {
                callback();
            });

            // Bulk payment click handler
            $(document).on("click", "#bulk_payment", function () {
                var month = $(".month_date").val();
                var year = $(".year_date").val();
                var datePicker = year + '_' + month;

                var title = 'Bulk Payment';
                var size = 'md';
                var url = 'payslip/bulk_pay_create/' + datePicker;

                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $.ajax({
                    url: url,
                    success: function (data) {
                        if (data.length) {
                            $('#commonModal .modal-body').html(data);
                            $("#commonModal").modal('show');
                        } else {
                            show_toastr('error', 'Permission denied.', 'error');
                            $("#commonModal").modal('hide');
                        }
                    },
                    error: function (data) {
                        show_toastr('error', data.responseJSON.error, 'error');
                    }
                });
            });

            $(document).on("click", ".payslip_delete", function () {
                var confirmation = confirm("Are you sure you want to delete this payslip?");
                var url = $(this).data('url');
                if (confirmation) {
                    $.ajax({
                        type: "GET",
                        url: url,
                        dataType: "JSON",
                        success: function (data) {
                            show_toastr('success', 'Payslip successfully deleted', 'success');
                            setTimeout(function () {
                                location.reload();
                            }, 800);
                        },
                    });
                }
            });
        });
    </script>
@endsection
