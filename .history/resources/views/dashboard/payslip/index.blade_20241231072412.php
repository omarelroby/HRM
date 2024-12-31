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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        </script>
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

                            var clickToPaid = '';
                            var employee_receipt = '';
                            var payslip = '';
                            var view = '';
                            var edit = '';
                            var deleted = '';
                            var form = '';

                            if(data[6] != 0) {
                                var payslip = '<a href="#" data-url="{{ url('payslip/pdf/') }}/' + id + '/' + datePicker + '" data-size="md-pdf"  data-ajax-popup="true" class="btn yellow-bg" data-title="{{__('Employee Payslip')}}">' + '{{__('Payslip')}}' + '</a> ';
                            }

                            if (data[6] == "UnPaid" && data[7] != 0) {
                                clickToPaid = '<a href="{{ url('payslip/paysalary/') }}/' + id + '/' + datePicker + '"  class="btn btn-success">' + '{{__('Click To Paid')}}' + '</a>  ';
                            }

                            if (data[7] != 0) {
                                view = '<a href="#" data-url="{{ url('payslip/showemployee/') }}/' + payslip_id + '"  data-ajax-popup="true" class="btn btn-info" data-title="{{__('View Employee Detail')}}">' + '{{__('View')}}' + '</a>';
                            }

                            if (data[7] != 0 && data[6] == "UnPaid") {
                                edit = '<a href="#" data-url="{{ url('payslip/editemployee/') }}/' + payslip_id + '"  data-ajax-popup="true" class="btn blue-bg" data-title="{{__('Edit Employee salary')}}">' + '{{__('Edit')}}' + '</a>';
                            }

                            employee_receipt = '<a target="_blank" href="{{ url('payslip/employeePayrollbarpdf/') }}/' + payslip_id + '/' + month + '/' + year + '"  class="btn btn-success">' + '{{__('Salary Receipt')}}' + '</a> ';

                            var url = '{{ route("payslip.delete", ":id") }}';
                            url = url.replace(':id', payslip_id);

                            @if(\Auth::user()->type!='employee')
                            if (data[7] != 0) {
                                deleted = '<a href="#"  data-url="' + url + '" class="payslip_delete btn red-bg" >' + '{{__('Delete')}}' + '</a>';
                            }
                            @endif

                            return view + payslip + clickToPaid + edit + deleted + form + employee_receipt;
                        }
                    },
                ]
            });

            function callback() {
                var month = $(".month_date").val();
                var year  = $(".year_date").val();
                var datePicker = year + '-' + month;
                var route = "{{ route('payslip.exportExcel',['monthValue','yaerValue']) }}";
                var url   = route.replace('monthValue' ,month);
                url       = url.replace('yaerValue' ,year);
                $('#payrollexport').attr('href' , url);

                var route2 = "{{ route('payslip.Payrollpdf',['monthValue','yaerValue']) }}";
                var url2   = route2.replace('monthValue' ,month);
                url2       = url2.replace('yaerValue' ,year);
                $('#payrollpdf').attr('href' , url2);

                var route3 = "{{ route('payslip.Payrollbarpdf',['monthValue','yaerValue']) }}";
                var url3   = route3.replace('monthValue' ,month);
                url3       = url3.replace('yaerValue' ,year);
                $('#payrollbarpdf').attr('href' , url3);

                $.ajax({
                    url: '{{route('payslip.search_json')}}',
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
                            show_toastr('error', 'Employee payslip not found ! please generate first.', 'error');
                        }
                    },
                    error: function (data) {

                    }
                });
            }

            callback();

            $(document).on("change", ".month_date,.year_date", function () {
                callback();
            });

            //bulkpayment Click
            $(document).on("click", "#bulk_payment", function () {
                var month = $(".month_date").val();
                var year = $(".year_date").val();
                var datePicker = year + '_' + month;

            });

            $(document).on('click', '#bulk_payment', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]', function () {
                var month = $(".month_date").val();
                var year = $(".year_date").val();
                var datePicker = year + '-' + month;


                var title = 'Bulk Payment';
                var size = 'md';
                var url = 'payslip/bulk_pay_create/' + datePicker;

                // return false;

                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $.ajax({
                    url: url,
                    success: function (data) {

                        // alert(data);
                        // return false;
                        if (data.length) {
                            $('#commonModal .modal-body').html(data);
                            $("#commonModal").modal('show');
                            // common_bind();
                        } else {
                            show_toastr('Error', 'Permission denied.');
                            $("#commonModal").modal('hide');
                        }
                    },
                    error: function (data) {
                        data = data.responseJSON;
                        show_toastr('Error', data.error);
                    }
                });
            });

            $(document).on("click", ".payslip_delete", function () {
                var confirmation = confirm("are you sure you want to delete this payslip?");
                var url = $(this).data('url');
                if (confirmation) {
                    $.ajax({
                        type: "GET",
                        url: url,
                        dataType: "JSON",
                        success: function (data) {

                            show_toastr('Success', 'Payslip successfully deleted', 'success');

                            setTimeout(function () {
                                location.reload();
                            }, 800)


                        },

                    });

                }
            });

        });
    </script>
@endsection
