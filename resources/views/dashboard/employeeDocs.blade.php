@extends('dashboard.layouts.master')
@include('dashboard.layouts.header')
@section('content')
    <div class="col-xxl-12 col-xl-12 d-flex">
        <div class="card flex-fill">


            <div class="card-body p-0">
                @if ($records->isNotEmpty())
                    <div class="table-responsive">
                        <div class="card-footer">
                            {{ $records->links('pagination::bootstrap-4') }}
                        </div>
                        <table class="table table-nowrap mb-0">
                            <thead>
                            <tr>
                                <th>{{ __('Document Type') }}</th>
                                <th>{{ __('Document') }}</th>
                                <th>{{ __('Employee') }}</th>
                                <th>{{ __('Expiry Date') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($records as $documentType => $documents)
                                @foreach ($documents as $record)
                                    <tr>
                                        <!-- Document Type -->
                                        <td>
                                            <span class="badge {{ $loop->parent->iteration % 2 === 0 ? 'bg-light text-dark' : 'bg-secondary text-white' }}">
                                                {{ $documentType }}
                                            </span>
                                        </td>
                                        <!-- Document Name -->
                                        <td>{{ $record->name ?? 'Unnamed Document' }}</td>
                                        <!-- Employee Name -->
                                        <td>{{ $record->employee->name ?? 'Unknown Employee' }}</td>
                                        <!-- Expiry Date -->
                                        <td>{{ \Carbon\Carbon::parse($record->end_date)->format('Y-m-d') ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <!-- Render pagination links -->

                @else
                    <p class="text-center py-4">{{ __('No records found.') }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
