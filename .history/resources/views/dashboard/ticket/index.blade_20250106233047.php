@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection

@section('conte')

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
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
                                            <a href="{{ URL::to('ticket/' . $ticket->id . '/reply') }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="{{ __('Reply') }}">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                            @if(\Auth::user()->type == 'company' || $ticket->ticket_created == \Auth::user()->id)
                                                @can('Delete Ticket')
                                                    <a href="#" class="btn btn-sm btn-danger delete-icon" data-toggle="tooltip" title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?') . '|' . __('This action cannot be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-form-{{ $ticket->id }}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['ticket.destroy', $ticket->id], 'id' => 'delete-form-' . $ticket->id, 'class' => 'd-none']) !!}
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