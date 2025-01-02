@extends('dashboard.layouts.master')
@section('content')
        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Employee</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="https://smarthr.dreamstechnologies.com/html/template/index.html"><i class="ti ti-smart-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Employee
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Employee Grid</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                    <div class="me-2 mb-2">
                        <div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
                            <a href="https://smarthr.dreamstechnologies.com/html/template/employees.html" class="btn btn-icon btn-sm me-1"><i class="ti ti-list-tree"></i></a>
                            <a href="https://smarthr.dreamstechnologies.com/html/template/employees-grid.html" class="btn btn-icon btn-sm active bg-primary text-white"><i class="ti ti-layout-grid"></i></a>
                        </div>
                    </div>
                    <div class="me-2 mb-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                <i class="ti ti-file-export me-1"></i>Export
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_employee" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Employee</a>
                    </div>
                    <div class="head-icons ms-2">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->

            <div class="row">

                <!-- Total Plans -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <span class="avatar avatar-lg bg-dark rounded-circle"><i class="ti ti-users"></i></span>
                                </div>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Total Employee</p>
                                    <h4>1007</h4>
                                </div>
                            </div>
                            <div>
                                <span class="badge badge-soft-purple badge-sm fw-normal">
                                    <i class="ti ti-arrow-wave-right-down"></i>
                                    +19.01%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total Plans -->

                <!-- Total Plans -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <span class="avatar avatar-lg bg-success rounded-circle"><i class="ti ti-user-share"></i></span>
                                </div>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">Active</p>
                                    <h4>1007</h4>
                                </div>
                            </div>
                            <div>
                                <span class="badge badge-soft-primary badge-sm fw-normal">
                                    <i class="ti ti-arrow-wave-right-down"></i>
                                    +19.01%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total Plans -->

                <!-- Inactive Plans -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <span class="avatar avatar-lg bg-danger rounded-circle"><i class="ti ti-user-pause"></i></span>
                                </div>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">InActive</p>
                                    <h4>1007</h4>
                                </div>
                            </div>
                            <div>
                                <span class="badge badge-soft-dark badge-sm fw-normal">
                                    <i class="ti ti-arrow-wave-right-down"></i>
                                    +19.01%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Inactive Companies -->

                <!-- No of Plans  -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <span class="avatar avatar-lg bg-info rounded-circle"><i class="ti ti-user-plus"></i></span>
                                </div>
                                <div class="ms-2 overflow-hidden">
                                    <p class="fs-12 fw-medium mb-1 text-truncate">New Joiners</p>
                                    <h4>67</h4>
                                </div>
                            </div>
                            <div>
                                <span class="badge badge-soft-secondary badge-sm fw-normal">
                                    <i class="ti ti-arrow-wave-right-down"></i>
                                    +19.01%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /No of Plans -->

            </div>
            <div class="card">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                        <h5>Employees Grid</h5>
                        <div class="d-flex align-items-center flex-wrap row-gap-3">
                            <div class="dropdown me-3">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                    Designation
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                    Sort By : Last 7 Days
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-32.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-09.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Brian Villalobos</a></h6>
                                <span class="badge badge-purple-transparent fs-10 fw-medium">Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">30</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">10</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">20</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-warning"> 30%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-01.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Harvey Smith</a></h6>
                                <span class="badge badge-purple-transparent fs-10 fw-medium">Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">25</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">7</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">18</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-danger"> 20%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-33.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Stephan Peralt</a></h6>
                                <span class="badge badge-dark-transparent fs-10 fw-medium">Software Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">15</h6>
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
                                        <h6 class="fw-medium">2</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-success"> 90%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-34.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Doglas Martini</a></h6>
                                <span class="badge badge-secondary-transparent fs-10 fw-medium">Full Stack Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">15</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">2</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">13</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-danger"> 10%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-02.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Linda Ray</a></h6>
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
                                        <h6 class="fw-medium">10</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">10</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-purple"> 50%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 50%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-35.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Elliot Murray</a></h6>
                                <span class="badge badge-purple-transparent fs-10 fw-medium">Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">40</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">35</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">5</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-success"> 93%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 93%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-36.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Rebecca Smtih</a></h6>
                                <span class="badge badge-soft-skyblue fs-10 fw-medium">Tester</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">30</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">22</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">8</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-pink"> 80%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-pink" role="progressbar" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-37.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Connie Waters</a></h6>
                                <span class="badge bg-pink-transparent fs-10 fw-medium">Software Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">25</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">11</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">14</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-warning"> 35%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 35%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-38.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Lori Broaddus</a></h6>
                                <span class="badge badge-secondary-transparent fs-10 fw-medium">Full Stack Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">40</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">27</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">16</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-pink"> 75%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-pink" role="progressbar" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-30.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Trent Frazier</a></h6>
                                <span class="badge bg-pink-transparent fs-10 fw-medium">Software Developer</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">30</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">17</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">13</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-purple"> 60%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                                <div>
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html" class="avatar avatar-xl avatar-rounded online border p-1 border-primary rounded-circle">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/users/user-31.jpg" class="img-fluid h-auto w-auto" alt="img">
                                    </a>
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
                                <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">Norene Valle</a></h6>
                                <span class="badge bg-danger-transparent fs-10 fw-medium">Trainee</span>
                            </div>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Projects</span>
                                        <h6 class="fw-medium">10</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Done</span>
                                        <h6 class="fw-medium">1</h6>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <span class="fs-12">Progress</span>
                                        <h6 class="fw-medium">9</h6>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-2 text-center">Productivity : <span class="text-danger"> 10%</span></p>
                            <div class="progress progress-xs mb-2">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Clients Grid -->

        </div>

@endsection
