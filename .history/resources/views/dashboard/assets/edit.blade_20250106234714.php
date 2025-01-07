@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update Custom Question') }}</h5>
                </div>
                <div class="card-body">
                    {{ Form::model($ticket, ['route' => ['ticket.update', $ticket->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
                    <div class="row">
                        <!-- Subject (English) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{ Form::label('title', __('Subject'), ['class' => 'form-label']) }}
                                {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Subject'), 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please enter a subject.') }}</div>
                            </div>
                        </div>

                        <!-- Subject (Arabic) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{ Form::label('title_ar', __('Subject (Arabic)'), ['class' => 'form-label']) }}
                                {{ Form::text('title_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Subject in Arabic'), 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please enter a subject in Arabic.') }}</div>
                            </div>
                        </div>

                        <!-- Employee Selection (For Admins) -->
                        @if(\Auth::user()->type != 'employee')
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    {{ Form::label('employee_id', __('Ticket for Employee'), ['class' => 'form-label']) }}
                                    {{ Form::select('employee_id', $employees, null, ['class' => 'form-control select2', 'placeholder' => __('Select Employee'), 'required' => 'required']) }}
                                    <div class="invalid-feedback">{{ __('Please select an employee.') }}</div>
                                </div>
                            </div>
                        @endif

                        <!-- Priority -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{ Form::label('priority', __('Priority'), ['class' => 'form-label']) }}
                                <select name="priority" class="form-control select2" required>
                                    <option value="low" @if($ticket->priority == 'low') selected @endif>{{ __('Low') }}</option>
                                    <option value="medium" @if($ticket->priority == 'medium') selected @endif>{{ __('Medium') }}</option>
                                    <option value="high" @if($ticket->priority == 'high') selected @endif>{{ __('High') }}</option>
                                    <option value="critical" @if($ticket->priority == 'critical') selected @endif>{{ __('Critical') }}</option>
                                </select>
                                <div class="invalid-feedback">{{ __('Please select a priority.') }}</div>
                            </div>
                        </div>

                        <!-- End Date -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{ Form::label('end_date', __('End Date'), ['class' => 'form-label']) }}
                                {{ Form::text('end_date', null, ['class' => 'form-control datepicker', 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please select an end date.') }}</div>
                            </div>
                        </div>

                        <!-- Description (English) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Description'), 'rows' => 3, 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please enter a description.') }}</div>
                            </div>
                        </div>

                        <!-- Description (Arabic) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{ Form::label('description_ar', __('Description (Arabic)'), ['class' => 'form-label']) }}
                                {{ Form::textarea('description_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Description in Arabic'), 'rows' => 3, 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please enter a description in Arabic.') }}</div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{ Form::label('status', __('Status'), ['class' => 'form-label']) }}
                                <select name="status" class="form-control select2" required>
                                    <option value="close" @if($ticket->status == 'close') selected @endif>{{ __('Close') }}</option>
                                    <option value="open" @if($ticket->status == 'open') selected @endif>{{ __('Open') }}</option>
                                    <option value="onhold" @if($ticket->status == 'onhold') selected @endif>{{ __('On Hold') }}</option>
                                </select>
                                <div class="invalid-feedback">{{ __('Please select a status.') }}</div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-close-white" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </div>
                    {{ Form::close() }}
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
@endsection
