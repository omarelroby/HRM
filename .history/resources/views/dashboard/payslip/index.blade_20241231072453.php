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
            $(document).on('click', '#bulk_payment', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]', function () {
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

    </script>
   
@endsection
