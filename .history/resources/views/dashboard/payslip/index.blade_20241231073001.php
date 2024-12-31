@extends('dashboard.layouts.master')

@section('content')
    <!-- Common Modal for Employee Payslip -->
    <div id="commonModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body-content"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
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
                        <tbody>
                            <!-- Data will be filled dynamically by DataTable -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#payslipTable').DataTable({
                "aoColumnDefs": [
                    {
                        "aTargets": [6],
                        "mData": null,
                        "mRender": function (data, type, full) {
                            return data[6] === 'Paid' ?
                                '<div class="badge badge-success">Paid</div>' :
                                '<div class="badge badge-danger">UnPaid</div>';
                        }
                    },
                    {
                        "aTargets": [7],
                        "mData": null,
                        "mRender": function (data, type, full) {
                            var actions = '';
                            if (data[6] !== 'Paid') {
                                actions += '<a href="#" class="btn btn-warning btn-sm view-payslip" data-id="' + data[0] + '" data-month="'+ data[2] +'" data-year="'+ data[3] +'" data-toggle="modal" data-target="#commonModal">View</a>';
                            }
                            return actions;
                        }
                    },
                ]
            });

            // View Payslip Modal Trigger
            $(document).on('click', '.view-payslip', function (e) {
                e.preventDefault();

                var payslipId = $(this).data('id');
                var month = $(this).data('month');
                var year = $(this).data('year');

                // Update Modal Title
                $('#commonModalLabel').text("Payslip Details for Employee #" + payslipId);

                // Load Payslip Content via AJAX
                $.ajax({
                    url: '{{ url("payslip/showemployee") }}/' + payslipId,
                    type: 'GET',
                    success: function (data) {
                        $('#modal-body-content').html(data);
                    },
                    error: function (err) {
                        $('#modal-body-content').html('<p class="text-danger">Error loading payslip details. Please try again later.</p>');
                    }
                });
            });
        });
    </script>
@endsection
