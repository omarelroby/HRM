@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection



@section('content')
    <div class="row">
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
                                                    <a href="#"
                                                       class="btn btn-sm btn-danger delete-icon"
                                                       data-toggle="tooltip"
                                                       title="{{ __('Delete') }}"
                                                       aria-label="{{ __('Delete') }}"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#deleteConfirmationModal-{{ $ticket->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    <!-- Delete Confirmation Modal -->
                                                    <div class="modal fade" id="deleteConfirmationModal-{{ $ticket->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel-{{ $ticket->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel-{{ $ticket->id }}">{{ __('Confirm Delete') }}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ __('Are you sure you want to delete this ticket? This action cannot be undone.') }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                                    <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-form-{{ $ticket->id }}').submit();">{{ __('Delete') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Form -->
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['ticket.destroy', $ticket->id],
                                                        'id' => 'delete-form-' . $ticket->id,
                                                        'class' => 'd-none'
                                                    ]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            @endif
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
