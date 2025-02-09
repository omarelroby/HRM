@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Tasks') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create tasks')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Task') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Tasks List') }}</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Employee ID') }}</th>
                                <th>{{ __('Task Name') }}</th>
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('Due Date') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Priority') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->employee->name ?? 'N/A' }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->start_date }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <!-- Status -->
                                    <td>
                    <span class="badge
                        {{ $task->status == 0 ? 'bg-success' : '' }}
                        {{ $task->status == 1 ? 'bg-warning' : '' }}
                        {{ $task->status == 2 ? 'bg-danger' : '' }}
                        {{ $task->status == 3 ? 'bg-primary' : '' }}">
                        @switch($task->status)
                            @case(1) {{ __('Active') }} @break
                            @case(0) {{ __('Pending') }} @break
                            @case(2) {{ __('Canceled') }} @break
                            @case(3) {{ __('Finished') }} @break
                        @endswitch
                    </span>
                                    </td>
                                    <!-- Priority -->
                                    <td>
                    <span class="badge
                        {{ $task->priority == 0 ? 'bg-info' : '' }}
                        {{ $task->priority == 1 ? 'bg-primary' : '' }}
                        {{ $task->priority == 2 ? 'bg-warning' : '' }}
                        {{ $task->priority == 3 ? 'bg-danger' : '' }}">
                        @switch($task->priority)
                            @case(0) {{ __('Low') }} @break
                            @case(1) {{ __('Medium') }} @break
                            @case(2) {{ __('High') }} @break
                            @case(3) {{ __('Critical') }} @break
                        @endswitch
                    </span>
                                    </td>
                                    <td class="text-right action-btns">
                                        @can('Edit tasks')
                                            <!-- Reply Button -->
                                            <a href="{{ route('tasks.edit',$task->id) }}"
                                               class="btn btn-sm btn-success mr-2"
                                               data-toggle="tooltip"
                                               title="{{ __('Edit') }}"
                                               aria-label="{{ __('Edit') }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan

                                        @can('Delete tasks')
                                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
    <!-- Add Ticket Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add New Task') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('tasks.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{ __('Field') }}</th>
                            <th>{{ __('Input') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Employee ID -->
                        <tr>
                            <td>{{ __('Employee ID') }}</td>
                            <td>
                                <select  name="employee_id" class="form-control select2" required>
                                    <option  value=""   >{{ __('Select Employee') }}</option>
                                    @foreach($employees as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{ __('Please select an employee.') }}</div>
                            </td>
                        </tr>

                        <!-- Name Label -->
                        <tr>
                            <td>{{ __('Name Label') }}</td>
                            <td>
                                <input type="text" name="name" class="form-control" placeholder="{{ __('Enter Task Name') }}" required>
                                <div class="invalid-feedback">{{ __('Please enter a name of task.') }}</div>
                            </td>
                        </tr>

                        <!-- Start Date -->
                        <tr>
                            <td>{{ __('Start Date') }}</td>
                            <td>
                                <input type="text" name="start_date" class="form-control datetimepicker" placeholder="{{ __('Select Start Date') }}" required>
                                <div class="invalid-feedback">{{ __('Please select a start date.') }}</div>
                            </td>
                        </tr>

                        <!-- Due Date -->
                        <tr>
                            <td>{{ __('Due Date') }}</td>
                            <td>
                                <input type="text" name="due_date" class="form-control datetimepicker" placeholder="{{ __('Select Due Date') }}" required>
                                <div class="invalid-feedback">{{ __('Please select a due date.') }}</div>
                            </td>
                        </tr>

                        <!-- Status -->
                        <tr>
                            <td>{{ __('Status') }}</td>
                            <td>
                                <select name="status" class="form-control select2" required>
                                    <option value="1">{{ __('Active') }}</option>
                                    <option selected value="0">{{ __('Pending') }}</option>
                                    <option value="2">{{ __('Canceled') }}</option>
                                    <option value="3">{{ __('Finished') }}</option>
                                </select>
                                <div class="invalid-feedback">{{ __('Please select a status.') }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Priority') }}</td>
                            <td>
                                <select name="priority" class="form-control select2" required>
                                    <option value="0">{{ __('Low') }}</option>
                                    <option value="1">{{ __('Medium') }}</option>
                                    <option value="2">{{ __('High') }}</option>
                                    <option value="3">{{ __('Critical') }}</option>
                                </select>
                                <div class="invalid-feedback">{{ __('Please select a priority.') }}</div>
                            </td>
                        </tr>
                        <!-- Note -->
                        <tr>
                            <td>{{ __('Note') }}</td>
                            <td>
                                <textarea name="note" class="form-control" placeholder="{{ __('Enter Note') }}" rows="3"></textarea>
                            </td>
                        </tr>

                        <!-- Priority -->


                        <!-- Created By -->
                        <tr>
                            <td>{{ __('Created By') }}</td>
                            <td>
                                <input type="text"   value="{{ auth()->user()->name }}" class="form-control" disabled>
                                <input type="text" hidden="" name="created_by" value="{{ auth()->user()->id }}" class="form-control" disabled>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <!-- Buttons -->
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Datepicker Script -->
<script>
    $(function () {
        $(".datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true,
        });
    });
</script>
    <script>
        $(function () {
            $('.datetimepicker').datetimepicker({
                format: 'DD/MM/YYYY',
                icons: {
                    time: 'ti ti-time',
                    date: 'ti ti-calendar',
                    up: 'ti ti-chevron-up',
                    down: 'ti ti-chevron-down',
                },
                widgetPositioning: {
                    horizontal: 'auto',
                    vertical: 'bottom'
                },
                // Append to body to avoid overflow issues
                widgetParent: 'body'
            });
        });
        $(document).ready(function () {
            $(document).on('change', '#employee_account_type', function () {
                if ($(this).val() == '0') {
                    // Show Salary Card Info and Hide IBAN Info
                    $('#salary_card_number_info').removeClass('d-none').show();
                    $('#IBAN_number_info').addClass('d-none').hide();
                } else if ($(this).val() == '1') {
                    // Show IBAN Info and Hide Salary Card Info
                    $('#IBAN_number_info').removeClass('d-none').show();
                    $('#salary_card_number_info').addClass('d-none').hide();
                }

            });

        });
        $(document).on('change' ,'#employee_account_type', function() {
            if($(this).val() == 0)
            {
                $('#salary_card_number_info').css('display','block');
                $('#IBAN_number_info').css('display','none');
            }else{
                $('#salary_card_number_info').css('display','none');
                $('#IBAN_number_info').css('display','block');
            }
        });

    </script>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
