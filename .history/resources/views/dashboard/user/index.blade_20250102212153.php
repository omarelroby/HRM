@extends('dashboard.layouts.master')
@section('content')
        <div class="content">


            <!-- Clients Grid -->
            <div class="row">
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Anthony Lewis</a></h6>
                                <span class="badge bg-pink-transparent fs-10 fw-medium">Software Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">20</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">13</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">7</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-purple"> 65%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Clients Grid -->

        </div>

@endsection
