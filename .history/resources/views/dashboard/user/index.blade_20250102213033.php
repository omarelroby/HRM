@extends('dashboard.layouts.master')
@section('content')
        <div class="content">
            <!-- Clients Grid -->
            <div class="row">
                @foreach ($users as $user)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>

                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-icon btn-sm rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end p-3">
                                        <li>
                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_employee">
                                                <i class="ti ti-edit me-1"></i>Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-1"></i>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">{{ $user->name }}</a></h6>
                                <p class="mb-2 text-center">{{ $user->type }}</p>
                                <span class="badge bg-pink-transparent fs-10 fw-medium">{{ $user->email ??'' }}</span>

                            </div>
                            @if($user->is_active)
                            <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-success">
                                <i class="ti ti-circle-filled fs-5 me-1">ACTIVE</i>
                            </span>
                            @else
                            <span class="fs-10 fw-medium d-inline-flex align-items-center badge badge-danger">
                                <i class="ti ti-circle-filled fs-5 me-1">CLOSE</i>
                            </span>
                            @endif
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /Clients Grid -->
        </div>

@endsection