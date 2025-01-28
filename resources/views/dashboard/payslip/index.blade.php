@extends('dashboard.layouts.master')
@push('css')
    <style>
        /* Custom Styles */
        .modal-content {
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .list-group-item {
            transition: background-color 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .btn-dark {
            transition: background-color 0.3s ease;
        }

        .btn-dark:hover {
            background-color: #1a1a1a;
        }

        .card {
            border: none;
            border-radius: 10px;
        }
    </style>

@endpush
@section('content')
    <!-- Common Modal -->
    <div id="commonModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>

                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
{{--                    <a id="payrollexport" href="#" class="btn btn-outline-success">--}}
{{--                        {{ __('Export') }} <i class="fa fa-file-excel-o"></i>--}}
{{--                    </a>--}}
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
             <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                     <div class="modal-body py-4" >
                       </div>
                         <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            @section('script')
                <!-- Add this to your HTML file -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Add these to your HTML file -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const downloadPdfBtn = document.getElementById('downloadPdfBtn');

                        downloadPdfBtn.addEventListener('click', function (event) {
                            event.preventDefault(); // Prevent the default link behavior

                            // Capture the modal content
                            const modalContent = document.querySelector('#addTrainingModal');

                            html2canvas(modalContent).then((canvas) => {
                                const imgData = canvas.toDataURL('image/png');
                                const { jsPDF } = window.jspdf;
                                const doc = new jsPDF('p', 'mm', 'a4');

                                // Add the image to the PDF
                                const imgWidth = doc.internal.pageSize.getWidth();
                                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                                doc.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);

                                // Save the PDF
                                doc.save('payslip.pdf');
                            });
                        });
                    });
                </script>
                <script>
                    $(document).ready(function () {
                        // Handle modal content loading
                        $(document).on('click', '[data-bs-target="#addTrainingModal"]', function (e) {
                            e.preventDefault();
                            var url = $(this).data('url'); // URL to fetch payslip data
                            var title = $(this).data('title'); // Modal title

                            // Set the modal title
                            $('#addTrainingModalLabel').text(title);

                            // Load content via AJAX
                            $.ajax({
                                url: url,
                                method: 'GET',
                                success: function (response) {
                                    // Inject the response into the modal body
                                    $('#addTrainingModal .modal-body').html(response);
                                    $('#addTrainingModal').modal('show'); // Show the modal
                                },
                                error: function () {
                                    alert('Failed to load content.');
                                }
                            });
                        });
                    });
                </script>


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
                                    "aTargets": [5], // Status column
                                    "mData": null,
                                    "mRender": function (data, type, full) {
                                        if (data[5] == 'Paid')
                                            return '<div class="badge badge-pill badge-success"><a href="#" class="text-white">' + data[5] + '</a></div>';
                                        else
                                            return '<div class="badge badge-pill badge-danger"><a href="#" class="text-white">' + data[5] + '</a></div>';
                                    }
                                },
                                {
                                    "aTargets": [6], // Action column
                                    "mData": null,
                                    "mRender": function (data, type, full) {
                                        var month = $(".month_date").val();
                                        var year = $(".year_date").val();
                                        var datePicker = year + '-' + month;
                                        var id = data[0];
                                        var payslip_id = data[6]; // Updated index for payslip_id

                                        var actions = '';
                                        if (data[5] != 0) { // Updated index for status check
                                            actions += '<a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" data-url="{{ url('payslip/pdf/') }}/' + id + '/' + datePicker + '" class="btn btn-warning btn-sm" data-title="{{__('Employee Payslip')}}">{{__('Payslip')}}</a> ';
                                        }
                                        if (data[5] == "UnPaid" && data[6] != 0) { // Updated indices
                                            actions += '<a href="{{ url('payslip/paysalary/') }}/' + id + '/' + datePicker + '" class="btn btn-success btn-sm">{{__('Click To Paid')}}</a> ';
                                        }


                                        if (data[6] != 0) { // Updated index for payslip_id
                                            actions += '<a href="{{ url('setsalary/') }}/' + id + '"    class="btn btn-info btn-sm" data-title="{{__('View Employee Detail')}}">{{__('Edit')}}</a>';
                                        }

                                        {{--if (data[6] != 0 && data[5] == "UnPaid") { // Updated indices--}}
                                        {{--    actions += '<a href="#" data-url="{{ url('payslip/editemployee/') }}/' + payslip_id + '" data-ajax-popup="true" class="btn btn-primary btn-sm" data-title="{{__('Edit Employee salary')}}">{{__('Edit')}}</a>';--}}
                                        {{--}--}}

                                        {{--actions += '<a target="_blank" href="{{ url('payslip/employeePayrollbarpdf/') }}/' + payslip_id + '/' + month + '/' + year + '" class="btn btn-secondary btn-sm">{{__('Salary Receipt')}}</a>';--}}

                                        var url = '{{ route("payslip.delete", ":id") }}';
                                        url = url.replace(':id', payslip_id);

                                        @if(\Auth::user()->type != 'employee')
                                        if (data[6] != 0) { // Updated index for payslip_id
                                            actions += '<a href="#" data-url="' + url + '" class="payslip_delete btn btn-danger btn-sm">{{__('Delete')}}</a>';
                                        }
                                        @endif

                                            return actions;
                                    }
                                }
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
                            var datePicker = year + '-' + month;

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

