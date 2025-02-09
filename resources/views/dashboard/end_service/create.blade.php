







@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Tasks') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex flex-column flex-md-row justify-content-end mb-3">
            <a href="{{ route('end-service-dismissal') }}" class="btn btn-primary btn-lg mb-2 mb-md-0 mr-md-2 mx-2">
                <i class="fas fa-user-minus"></i> {{ __('Create New Dismissal') }}
            </a>
            <a href="{{ route('end-service-dismissal') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-sign-out-alt"></i> {{ __('Create New Resignation') }}
            </a>
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('End of service gratuity') }}</h5>
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
                                <th>{{ __('Start Date') }}</th>
                                <th>{{ __('End Date') }}</th>
                                <th>{{ __('Duration') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $service->employee->name ?? 'N/A' }}</td>
                                    <td>{{ $service->work_start_date }}</td>
                                    <td>{{ $service->work_end_date }}</td>
                                    <td>{{ $service->period_by_day }}</td>
                                    <td>{{ $service->amount }}</td>

                                    <td class="text-right action-btns">

                                        <!-- Reply Button -->
                                        <a href="{{ route('tasks.edit',$task->id) }}"
                                           class="btn btn-sm btn-success mr-2"
                                           data-toggle="tooltip"
                                           title="{{ __('Edit') }}"
                                           aria-label="{{ __('Edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>



                                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @e
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


    {{Form::open(array('url'=>'ticket','method'=>'post'))}}
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
            <div class="form-group">
                {{Form::label('title',__('Subject'),['class'=>'form-control-label'])}}
                {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject')))}}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{Form::label('title_ar',__('Subject_ar'),['class'=>'form-control-label'])}}
                {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject arabic')))}}
            </div>
            </div>
        </div>
    </div>
    @if(\Auth::user()->type!='employee')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{Form::label('employee_id',__('Ticket for Employee'),['class'=>'form-control-label'])}}
                    {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','placeholder'=>__('Select Employee')))}}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('priority',__('Priority'),['class'=>'form-control-label'])}}
                <select name="priority" id="" class="form-control select2">
                    <option value="low">{{__('Low')}}</option>
                    <option value="medium">{{__('Medium')}}</option>
                    <option value="high">{{__('High')}}</option>
                    <option value="critical">{{__('critical')}}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('end_date',__('End Date'),['class'=>'form-control-label'])}}
                {{Form::text('end_date',null,array('class'=>'form-control datepicker'))}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
                {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Ticket Description')))}}
            </div>
        </div>
         <div class="col-md-12">
            <div class="form-group">
                {{Form::label('description_ar',__('Description_ar'),['class'=>'form-control-label'])}}
                {{Form::textarea('description_ar',null,array('class'=>'form-control','placeholder'=>__('Ticket Description arabic')))}}
            </div>
        </div>

        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}

    <script>
        $(function () {
            $(".gregorian-date , .datepicker").hijriDatePicker({
            format:'YYYY-M-D',
            showSwitcher: false,
            hijri:false,
            useCurrent: true,
            });
        });
    </script>
