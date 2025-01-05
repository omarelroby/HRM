@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Last Login') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ __('Last Login Details') }}</h5>
                    <div>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Refresh">
                            <i class="ti ti-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Last Login') }}</th>
                                    <th>{{ __('Role') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            @if($user->type == 'employee')
                                                {{ \Auth::user()->employeeIdFormat($user->id) }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if($user->last_login)
                                                {{ \Carbon\Carbon::parse($user->last_login)->format('M d, Y h:i A') }}
                                            @else
                                                <span class="text-muted">{{ __('Never Logged In') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ ucfirst($user->type) }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <h6 class="text-muted">{{ __('No users found.') }}</h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    // Enable Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection
