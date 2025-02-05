@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Plan Requests') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Plan Request')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addPlanRequestModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Plan Request') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Plan Requests List') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Plan') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th width="15%">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($plansRequests as $planRequest)
                                <tr>
                                    <td>{{ $planRequest->name }}</td>
                                    <td>{{ $planRequest->Plan->name ?? __('N/A') }}</td>
                                    <td>{{ $planRequest->phone }}</td>
                                    <td>{{ $planRequest->email }}</td>
                                    <td class="text-right">

                                            <form method="POST" action="{{ route('plan-requests.destroy', $planRequest->id) }}"
                                                  class="d-inline"
                                                  onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

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
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
