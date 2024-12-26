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
                        <a href="index.html"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Employee
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Employee List</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="me-2 mb-2">
                <div class="d-flex align-items-center border bg-white rounded p-1 me-2 icon-list">
                    <a href="employees.html" class="btn btn-icon btn-sm active bg-primary text-white me-1"><i class="ti ti-list-tree"></i></a>
                    <a href="employees-grid.html" class="btn btn-icon btn-sm"><i class="ti ti-layout-grid"></i></a>
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
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            <h5>Plan List</h5>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                <div class="me-3">
                    <div class="input-icon-end position-relative">
                        <input type="text" class="form-control date-range bookingrange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
                        <span class="input-icon-addon">
                            <i class="ti ti-chevron-down"></i>
                        </span>
                    </div>
                </div>
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
                <div class="dropdown me-3">
                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                        Select Status
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Active</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Inactive</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                        Sort By : Last 7 Days
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="custom-datatable-filter table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                    <label>Row Per Page <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select form-select-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> Entries</label>
                </div>
            </div>
                        <div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control form-control-sm" placeholder="Search" aria-controls="DataTables_Table_0">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row dt-row"><div class="col-sm-12 table-responsive">
                            <table class="table datatable dataTable no-footer" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                            : activate to sort column descending" style="width: 21px;">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Emp ID: activate to sort column ascending" style="width: 55.5341px;">Emp ID</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 136.818px;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 155.534px;">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 95.2045px;">Phone</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 126.648px;">Designation</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Joining Date: activate to sort column ascending" style="width: 79.2273px;">Joining Date</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 74.5568px;">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 60px;"></th></tr>
                    </thead>
                    <tbody>
                    <tr class="odd">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-001</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-32.jpg" class="img-fluid rounded-circle" alt="img">
                                    </a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Anthony Lewis
                                            </a>
                                        </p>
                                        <span class="fs-12">Finance</span>
                                    </div>
                                </div>
                            </td>
                            <td>anthony@example.com</td>
                            <td>(123) 4567 890</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Finance
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>12 Sep 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit">
                                        </i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-002</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-09.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Brian Villalobos</a></p>
                                        <span class="fs-12">Developer</span>
                                    </div>
                                </div>
                            </td>
                            <td>brian@example.com</td>
                            <td>(179) 7382 829</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Developer
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>24 Oct 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="odd">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-003</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-01.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Harvey Smith</a></p>
                                        <span class="fs-12">Developer</span>
                                    </div>
                                </div>
                            </td>
                            <td>harvey@example.com</td>
                            <td>(184) 2719 738</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Developer
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>18 Feb 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-004</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-33.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Stephan Peralt</a></p>
                                        <span class="fs-12">Executive Officer</span>
                                    </div>
                                </div>
                            </td>
                            <td>peral@example.com</td>
                            <td>(193) 7839 748</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Executive
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>17 Oct 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="odd">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-005</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-33.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Doglas Martini</a></p>
                                        <span class="fs-12">Manager</span>
                                    </div>
                                </div>
                            </td>
                            <td>martniwr@example.com</td>
                            <td>(183) 9302 890</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Manager
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>20 Jul 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-006</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-02.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Linda Ray</a></p>
                                        <span class="fs-12">Finance</span>
                                    </div>
                                </div>
                            </td>
                            <td>ray456@example.com</td>
                            <td>(120) 3728 039</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Finance
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>10 Apr 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="odd">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-007</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-35.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Elliot Murray</a></p>
                                        <span class="fs-12">Finance</span>
                                    </div>
                                </div>
                            </td>
                            <td>murray@example.com</td>
                            <td>(102) 8480 832</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Developer
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>29 Aug 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-008</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-36.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Rebecca Smtih</a></p>
                                        <span class="fs-12">Executive</span>
                                    </div>
                                </div>
                            </td>
                            <td>smtih@example.com</td>
                            <td>(162) 8920 713</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Executive
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>22 Feb 2024</td>
                            <td>
                                <span class="badge badge-danger d-inline-flex align-items-center badge-sm">
                                    <i class="ti ti-point-filled me-1"></i>Inactive
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="odd">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-009</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-37.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Connie Waters</a></p>
                                        <span class="fs-12">Developer</span>
                                    </div>
                                </div>
                            </td>
                            <td>connie@example.com</td>
                            <td>(189) 0920 723</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Developer
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Finance</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>03 Nov 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="sorting_1">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td><a href="employee-details.html">Emp-010</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="employee-details.html" class="avatar avatar-md" data-bs-toggle="modal" data-bs-target="#view_details"><img src="assets/img/users/user-38.jpg" class="img-fluid rounded-circle" alt="img"></a>
                                    <div class="ms-2">
                                        <p class="text-dark mb-0"><a href="employee-details.html" data-bs-toggle="modal" data-bs-target="#view_details">Lori Broaddus</a></p>
                                        <span class="fs-12">Finance</span>
                                    </div>
                                </div>
                            </td>
                            <td>broaddus@example.com</td>
                            <td>(168) 8392 823</td>
                            <td>
                                <div class="dropdown me-3">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        Finance
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Executive</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Developer</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>17 Dec 2024</td>
                            <td>
                                <span class="badge badge-success d-inline-flex align-items-center badge-xs">
                                    <i class="ti ti-point-filled me-1"></i>Active
                                </span>
                            </td>
                            <td>
                                <div class="action-icon d-inline-flex">
                                    <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash"></i></a>
                                </div>
                            </td>
                        </tr></tbody>
                </table>
            </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 - 10 of 10 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link">
                                    <i class="ti ti-chevron-left"></i>
                                </a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                                <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link">
                                    <i class="ti ti-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>

</div>
{{-- add Employee Modal --}}
<div class="modal fade" id="add_employee">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <h4 class="modal-title me-2">Add New Employee</h4><span>Employee  ID : EMP -0024</span>
                </div>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            </div>
            <form action="employees.html">
                <div class="contact-grids-tab">
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#basic-info" type="button" role="tab" aria-selected="true">Basic Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-selected="false" tabindex="-1">Permissions</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="info-tab" tabindex="0">
                            <div class="modal-body pb-0 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
                                                <i class="ti ti-photo text-gray-2 fs-16"></i>
                                            </div>
                                            <div class="profile-upload">
                                                <div class="mb-2">
                                                    <h6 class="mb-1">Upload Profile Image</h6>
                                                    <p class="fs-12">Image should be below 4 mb</p>
                                                </div>
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                        Upload
                                                        <input type="file" class="form-control image-sign" multiple="">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Employee ID <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Joining Date <span class="text-danger"> *</span></label>
                                            <div class="input-icon-end position-relative">
                                                <input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-calendar text-gray-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Username <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger"> *</span></label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Password <span class="text-danger"> *</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="pass-input form-control">
                                                <span class="ti toggle-password ti-eye-off"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Confirm Password <span class="text-danger"> *</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="pass-inputs form-control">
                                                <span class="ti toggle-passwords ti-eye-off"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <select class="select select2-hidden-accessible" data-select2-id="select2-data-1-mp5d" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-3-4p6t">Select</option>
                                                <option>All Department</option>
                                                <option>Finance</option>
                                                <option>Developer</option>
                                                <option>Executive</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-q307" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-tb38-container" aria-controls="select2-tb38-container"><span class="select2-selection__rendered" id="select2-tb38-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Designation</label>
                                            <select class="select select2-hidden-accessible" data-select2-id="select2-data-4-22zb" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="select2-data-6-5l16">Select</option>
                                                <option>Finance</option>
                                                <option>Developer</option>
                                                <option>Executive</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-5-qbjc" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fp0s-container" aria-controls="select2-fp0s-container"><span class="select2-selection__rendered" id="select2-fp0s-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">About <span class="text-danger"> *</span></label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab" tabindex="0">
                        <div class="modal-body">
                            <div class="card bg-light-500 shadow-none">
                                <div class="card-body d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <h6>Enable Options</h6>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="form-check form-switch me-2">
                                            <label class="form-check-label mt-0">
                                            <input class="form-check-input me-2" type="checkbox" role="switch">
                                                Enable all Module
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <label class="form-check-label mt-0">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                Select All
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive border rounded">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch" checked="">
                                                        Holidays
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Leaves
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Clients
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Projects
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Tasks
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Chats
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch" checked="">
                                                    Assets
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Timing Sheets
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success_modal">Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end add Employee Modal --}}
{{-- edit Modal --}}
<div class="modal fade" id="edit_employee">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <h4 class="modal-title me-2">Edit Employee</h4><span>Employee  ID : EMP -0024</span>
                </div>
                <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ti ti-x"></i>
                </button>
            </div>
            <form action="employees.html">
                <div class="contact-grids-tab">
                    <ul class="nav nav-underline" id="myTab2" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="info-tab2" data-bs-toggle="tab" data-bs-target="#basic-info2" type="button" role="tab" aria-selected="true">Basic Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="address-tab2" data-bs-toggle="tab" data-bs-target="#address2" type="button" role="tab" aria-selected="false" tabindex="-1">Permissions</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="basic-info2" role="tabpanel" aria-labelledby="info-tab2" tabindex="0">
                            <div class="modal-body pb-0 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 bg-light w-100 rounded p-3 mb-4">
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl rounded-circle border border-dashed me-2 flex-shrink-0 text-dark frames">
                                                <img src="assets/img/users/user-13.jpg" alt="img" class="rounded-circle">
                                            </div>
                                            <div class="profile-upload">
                                                <div class="mb-2">
                                                    <h6 class="mb-1">Upload Profile Image</h6>
                                                    <p class="fs-12">Image should be below 4 mb</p>
                                                </div>
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn btn btn-sm btn-primary me-2">
                                                        Upload
                                                        <input type="file" class="form-control image-sign" multiple="">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-light btn-sm">Cancel</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="Anthony">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="email" class="form-control" value="Lewis">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Employee ID <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="Emp-001">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Joining Date <span class="text-danger"> *</span></label>
                                            <div class="input-icon-end position-relative">
                                                <input type="text" class="form-control datetimepicker" placeholder="dd/mm/yyyy" value="17-10-2022">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-calendar text-gray-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Username <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="Anthony">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email <span class="text-danger"> *</span></label>
                                            <input type="email" class="form-control" value="anthony@example.com	">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Password <span class="text-danger"> *</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="pass-input form-control">
                                                <span class="ti toggle-password ti-eye-off"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label">Confirm Password <span class="text-danger"> *</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="pass-inputs form-control">
                                                <span class="ti toggle-passwords ti-eye-off"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="(123) 4567 890">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Company<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" value="Abac Company">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <select class="select select2-hidden-accessible" data-select2-id="select2-data-7-ncp1" tabindex="-1" aria-hidden="true">
                                                <option>Select</option>
                                                <option>All Department</option>
                                                <option selected="" data-select2-id="select2-data-9-4hln">Finance</option>
                                                <option>Developer</option>
                                                <option>Executive</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-8-xnn6" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-wyl2-container" aria-controls="select2-wyl2-container"><span class="select2-selection__rendered" id="select2-wyl2-container" role="textbox" aria-readonly="true" title="Finance">Finance</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Designation</label>
                                            <select class="select select2-hidden-accessible" data-select2-id="select2-data-10-rgme" tabindex="-1" aria-hidden="true">
                                                <option>Select</option>
                                                <option selected="" data-select2-id="select2-data-12-gdo3">Finance</option>
                                                <option>Developer</option>
                                                <option>Executive</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-11-pr1v" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ip24-container" aria-controls="select2-ip24-container"><span class="select2-selection__rendered" id="select2-ip24-container" role="textbox" aria-readonly="true" title="Finance">Finance</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">About <span class="text-danger"> *</span></label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="address2" role="tabpanel" aria-labelledby="address-tab2" tabindex="0">
                        <div class="modal-body">
                            <div class="card bg-light-500 shadow-none">
                                <div class="card-body d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <h6>Enable Options</h6>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="form-check form-switch me-2">
                                            <label class="form-check-label mt-0">
                                            <input class="form-check-input me-2" type="checkbox" role="switch">
                                                Enable all Module
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <label class="form-check-label mt-0">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                Select All
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive border rounded">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch" checked="">
                                                        Holidays
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Leaves
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Clients
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Projects
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Tasks
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Chats
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch" checked="">
                                                    Assets
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox" checked="">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-switch me-2">
                                                    <label class="form-check-label mt-0">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch">
                                                    Timing Sheets
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Read
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Write
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Create
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Delete
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Import
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check d-flex align-items-center">
                                                    <label class="form-check-label mt-0">
                                                        <input class="form-check-input" type="checkbox">
                                                        Export
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success_modal">Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end edit Modal --}}
{{-- add Employee Success  --}}
<div class="modal fade" id="success_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center p-3">
                    <span class="avatar avatar-lg avatar-rounded bg-success mb-3"><i class="ti ti-check fs-24"></i></span>
                    <h5 class="mb-2">Employee Added Successfully</h5>
                    <p class="mb-3">Stephan Peralt has been added with Client ID : <span class="text-primary">#EMP - 0001</span>
                    </p>
                    <div>
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="employees.html" class="btn btn-dark w-100">Back to List</a>
                            </div>
                            <div class="col-6">
                                <a href="employee-details.html" class="btn btn-primary w-100">Detail Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end Employee Success  --}}
{{-- delete modal --}}
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                    <i class="ti ti-trash-x fs-36"></i>
                </span>
                <h4 class="mb-1">Confirm Delete</h4>
                <p class="mb-3">You want to delete all the marked items, this cant be undone once you delete.</p>
                <div class="d-flex justify-content-center">
                    <a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
                    <a href="employees.html" class="btn btn-danger">Yes, Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end delete modal --}}
@endsection
