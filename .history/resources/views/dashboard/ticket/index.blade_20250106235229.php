@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Ticket')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Ticket') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Ticket List') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{ __('New') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Ticket Code') }}</th>
                                    @role('company')
                                        <th>{{ __('Employee') }}</th>
                                    @endrole
                                    <th>{{ __('Priority') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Created By') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th width="3%">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>
                                            @if($ticket->ticketUnread() > 0)
                                                <i title="New Message" class="fa fa-circle circle text-success"></i>
                                            @endif
                                        </td>
                                        <td>{{ $ticket->title }}</td>
                                        <td>{{ $ticket->ticket_code }}</td>
                                        @role('company')
                                            <td>{{ \Auth::user()->getUser($ticket->employee_id)->name ?? '' }}</td>
                                        @endrole
                                        <td>
                                            <span class="badge badge-{{ $ticket->priority == 'low' ? 'info' : ($ticket->priority == 'medium' ? 'warning' : 'danger') }}">
                                                {{ $ticket->priority }}
                                            </span>
                                        </td>
                                        <td>{{ \Auth::user()->dateFormat($ticket->end_date) }}</td>
                                        <td>{{ $ticket->createdBy->name ?? '' }}</td>
                                        <td>{{ Str::limit($ticket->description, 50) }}</td>
                                        <td class="text-right">
                                            <!-- Reply Button -->
                                            <a href="{{ URL::to('ticket/' . $ticket->id . '/reply') }}"
                                               class="btn btn-sm btn-success mr-2"
                                               data-toggle="tooltip"
                                               title="{{ __('Reply') }}"
                                               aria-label="{{ __('Reply') }}">
                                                <i class="fa fa-reply"></i>
                                            </a>

                                         <!-- Delete Button (Conditional) -->
                                         @if(\Auth::user()->type == 'company' || $ticket->ticket_created == \Auth::user()->id)

                                        @can('Delete Ticket')
                                        <form method="POST" action="{{ route('ticket.destroy', $ticket->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
    <!-- Add Job Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{ Form::open(['url' => 'ticket', 'method' => 'post', 'class' => 'needs-validation', 'novalidate']) }}
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
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {{ Form::label('priority', __('Priority'), ['class' => 'form-label']) }}
                            <select name="priority" class="form-control select2" required>
                                <option value="low">{{ __('Low') }}</option>
                                <option value="medium">{{ __('Medium') }}</option>
                                <option value="high">{{ __('High') }}</option>
                                <option value="critical">{{ __('Critical') }}</option>
                            </select>
                            <div class="invalid-feedback">{{ __('Please select a priority.') }}</div>
                        </div>
                    </div>

                    <!-- End Date -->
                    <div class="col-md-6 mb-3">
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
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Description'), 'required' => 'required', 'rows' => 3]) }}
                            <div class="invalid-feedback">{{ __('Please enter a description.') }}</div>
                        </div>
                    </div>

                    <!-- Description (Arabic) -->
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            {{ Form::label('description_ar', __('Description (Arabic)'), ['class' => 'form-label']) }}
                            {{ Form::textarea('description_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Description in Arabic'), 'required' => 'required', 'rows' => 3]) }}
                            <div class="invalid-feedback">{{ __('Please enter a description in Arabic.') }}</div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
