@extends('dashboard.layouts.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card user-list-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="text-center w-100">Employees List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($employees as $employee)
                            <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                                <div class="card user-card text-center">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="w-100 text-center">
                                                <div class="product-imitation mb-3">
                                                    <img style="width:100px;height:100px;" src="{{ !empty($employee->user->avatar) ? asset(Storage::url('uploads/avatar')).'/'.$employee->user->avatar : asset(Storage::url('uploads/avatar')).'/avatar.png' }}" class="avatar rounded-circle avatar-xl">
                                                </div>
                                                <h5 class="card-title mb-0">
                                                    @can('Show Employee Profile')
                                                        <a href="{{ route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id)) }}">{{ $employee->name }}</a>
                                                    @else
                                                        <a href="#">{{ $employee->name }}</a>
                                                    @endcan
                                                </h5>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_employee_{{ $employee->id }}">
                                                            <i class="ti ti-edit me-1"></i>Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:void(0);" data-url="{{ route('employee.destroy', $employee->id) }}" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                            <i class="ti ti-trash me-1"></i>Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="card-text mb-2">
                                            <span class="badge bg-pink-transparent fs-10 fw-medium">{{ !empty($employee->designation) ? $employee->designation->name : 'No Designation' }}</span>
                                        </p>
                                        <span class="badge bg-blue-transparent fs-10 fw-medium">{{ \Auth::user()->employeeIdFormat($employee->employee_id) }}</span>
                                        <br />
                                        @if($employee->is_active)
                                            <span class="badge bg-success">ACTIVE</span>
                                        @else
                                            <span class="badge bg-danger">CLOSE</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="col-12">
                                <div class="text-center">
                                    <h6>{{ __('There are no employees') }}</h6>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = document.getElementById('delete_modal');
        const deleteForm = document.getElementById('delete_form');

        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const deleteUrl = button.getAttribute('data-url'); // Extract the URL from the data-url attribute
            deleteForm.action = deleteUrl; // Update the form action dynamically
        });
    });
</script>
@endsection