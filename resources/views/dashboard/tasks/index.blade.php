@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Tasks') }}
@endsection



@section('content')

    <!-- Page Wrapper -->

        <div class="content">

            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <div class="my-auto mb-2">
                    <h2 class="mb-1">Tasks</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">

                            <li class="breadcrumb-item">
                                Employee
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tasks</li>
                        </ol>
                    </nav>
                </div>
                <div class="my-xl-auto right-content d-flex">
                    <div class="mb-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_task" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add Task</a>
                    </div>
                    <div class="head-icons ms-2 mb-0">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->

            <div class="row">
                <div class="col-xl-4">
                    <div>
                        @foreach($tasks as $task)
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                                    <a href="https://smarthr.dreamstechnologies.com/html/template/task-details.html" class="flex-shrink-0 me-2">
                                        <img src="https://smarthr.dreamstechnologies.com/html/template/assets/img/social/project-01.svg" alt="Img">
                                    </a>
                                    <div>
                                        <h6 class="mb-1"><a href="https://smarthr.dreamstechnologies.com/html/template/task-details.html">{{$task->name??''}}</a></h6>
                                        <div class="d-flex align-items-center">
                                            <span>8 tasks</span>
                                            <span class="mx-1"><i class="ti ti-point-filled text-primary"></i></span>
                                            <span>15 &nbsp;Completed</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <span class="mb-1 d-block">Deadline</span>
                                            <p class="text-dark">{{$task->due_date??''}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <span class="mb-1 d-block">Value</span>
                                            <p class="text-dark">$549987</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <span class="mb-1 d-block">{{__('employee')}}</span>
                                            <h6 class="fw-normal d-flex align-items-center">
                                                <img class="avatar avatar-xs rounded-circle me-1" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="Img">
                                                {{$task->employee->name??''}}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light p-2">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                                <span class="fw-medium d-flex align-items-center">
													<i class="ti ti-clock text-primary me-2"></i>Total 565 Hrs
												</span>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <small class="text-dark">54% Completed</small>
                                                </div>
                                                <div class="progress  progress-xs">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 54%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                <h6 class="me-2">Priority</h6>
                                <ul class="nav nav-pills border d-inline-flex p-1 rounded bg-light todo-tabs" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link btn btn-sm btn-icon py-3 d-flex align-items-center justify-content-center w-auto active" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-selected="true">All</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link btn btn-sm btn-icon py-3 d-flex align-items-center justify-content-center w-auto" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-selected="false" tabindex="-1">High</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link btn btn-sm btn-icon py-3 d-flex align-items-center justify-content-center w-auto" data-bs-toggle="pill" data-bs-target="#pills-medium" type="button" role="tab" aria-selected="false" tabindex="-1">Medium</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link btn btn-sm btn-icon py-3 d-flex align-items-center justify-content-center w-auto" data-bs-toggle="pill" data-bs-target="#pills-low" type="button" role="tab" aria-selected="false" tabindex="-1">Low</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="d-flex align-items-center justify-content-lg-end flex-wrap row-gap-3 mb-3">
                                <div class="input-icon w-120 position-relative me-2">
                                        <span class="input-icon-addon">
											<i class="ti ti-calendar"></i>
										</span>
                                    <input type="text" class="form-control datetimepicker" placeholder="Due Date">
                                </div>
                                <div class="dropdown me-2">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        All Tags
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">All Tags</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Internal</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Projects</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Meetings</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Reminder</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Research</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="d-inline-flex me-2">Sort By : </span>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center border-0 bg-transparent p-0 text-dark" data-bs-toggle="dropdown">
                                            Created Date
                                        </a>
                                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Created Date</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Priority</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Due Date</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Hospital Administration</h5>
                                    <div class="bg-light p-2 rounded">
                                        <span class="d-block mb-1">Tasks Done</span>
                                        <h4 class="mb-2">41 / 43</h4>
                                        <div class="progress progress-xs mb-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 84%;"></div>
                                        </div>
                                        <p>84% Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mb-3 pb-3 border-bottom">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        <i class="ti ti-file-export me-1"></i> Mark All as Completed
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">All Tags</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Internal</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Projects</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Meetings</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Reminder</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Research</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="list-group list-group-flush mb-4">
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-lg-6 col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <span class="me-2 d-flex align-items-center rating-select"><i class="ti ti-star-filled filled"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Patient appointment booking</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-skyblue me-3">Web Design</span>
                                                <span class="badge bg-soft-pink d-inline-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Onhold</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-13.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-15.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Appointment booking with payment gateway</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>25 May 2024</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-info me-3">Social</span>
                                                <span class="badge bg-transparent-purple d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-20.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-21.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-22.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Doctor available module</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-purple me-3">Meetings</span>
                                                <span class="badge badge-secondary-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-23.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-24.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-25.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Private chat module</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-skyblue me-3">Web Design</span>
                                                <span class="badge badge-purple-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-28.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-29.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-30.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Patient and Doctor video conferencing</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-pink me-3">Research</span>
                                                <span class="badge badge-purple-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-18.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
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
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Hospital Administration</h5>
                                    <div class="bg-light p-2 rounded">
                                        <span class="d-block mb-1">Tasks Done</span>
                                        <h4 class="mb-2">41 / 43</h4>
                                        <div class="progress progress-xs mb-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 84%;"></div>
                                        </div>
                                        <p>84% Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mb-3 pb-3 border-bottom">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        <i class="ti ti-file-export me-1"></i> Mark All as Completed
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">All Tags</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Internal</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Projects</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Meetings</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Reminder</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Research</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="list-group list-group-flush mb-4">
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-lg-6 col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <span class="me-2 d-flex align-items-center rating-select"><i class="ti ti-star-filled filled"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Patient appointment booking</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-skyblue me-3">Web Design</span>
                                                <span class="badge bg-soft-pink d-inline-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Onhold</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-13.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-15.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Appointment booking with payment gateway</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>25 May 2024</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-info me-3">Social</span>
                                                <span class="badge bg-transparent-purple d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-20.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-21.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-22.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Doctor available module</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-purple me-3">Meetings</span>
                                                <span class="badge badge-secondary-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-23.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-24.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-25.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Private chat module</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-skyblue me-3">Web Design</span>
                                                <span class="badge badge-purple-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-28.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-29.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-30.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Patient and Doctor video conferencing</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-pink me-3">Research</span>
                                                <span class="badge badge-purple-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-18.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
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
                        <div class="tab-pane fade" id="pills-medium" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Hospital Administration</h5>
                                    <div class="bg-light p-2 rounded">
                                        <span class="d-block mb-1">Tasks Done</span>
                                        <h4 class="mb-2">41 / 43</h4>
                                        <div class="progress progress-xs mb-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 84%;"></div>
                                        </div>
                                        <p>84% Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mb-3 pb-3 border-bottom">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        <i class="ti ti-file-export me-1"></i> Mark All as Completed
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">All Tags</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Internal</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Projects</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Meetings</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Reminder</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Research</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="list-group list-group-flush mb-4">
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-lg-6 col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <span class="me-2 d-flex align-items-center rating-select"><i class="ti ti-star-filled filled"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Patient appointment booking</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-skyblue me-3">Web Design</span>
                                                <span class="badge bg-soft-pink d-inline-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Onhold</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-13.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-15.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Appointment booking with payment gateway</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>25 May 2024</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-info me-3">Social</span>
                                                <span class="badge bg-transparent-purple d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-20.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-21.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-22.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Doctor available module</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-purple me-3">Meetings</span>
                                                <span class="badge badge-secondary-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-23.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-24.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-25.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Private chat module</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-skyblue me-3">Web Design</span>
                                                <span class="badge badge-purple-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-28.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-29.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-30.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Patient and Doctor video conferencing</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-pink me-3">Research</span>
                                                <span class="badge badge-purple-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-18.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
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
                        <div class="tab-pane fade" id="pills-low" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Hospital Administration</h5>
                                    <div class="bg-light p-2 rounded">
                                        <span class="d-block mb-1">Tasks Done</span>
                                        <h4 class="mb-2">41 / 43</h4>
                                        <div class="progress progress-xs mb-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 84%;"></div>
                                        </div>
                                        <p>84% Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mb-3 pb-3 border-bottom">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                        <i class="ti ti-file-export me-1"></i> Mark All as Completed
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">All Tags</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Internal</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Projects</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Meetings</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Reminder</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item rounded-1">Research</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="list-group list-group-flush mb-4">
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-lg-6 col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <span class="me-2 d-flex align-items-center rating-select"><i class="ti ti-star-filled filled"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Patient appointment booking</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-skyblue me-3">Web Design</span>
                                                <span class="badge bg-soft-pink d-inline-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Onhold</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-13.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-15.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Appointment booking with payment gateway</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>25 May 2024</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-info me-3">Social</span>
                                                <span class="badge bg-transparent-purple d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-20.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-21.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-22.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Doctor available module</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-purple me-3">Meetings</span>
                                                <span class="badge badge-secondary-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Pending</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-23.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-24.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-25.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded mb-2 p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Private chat module</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-skyblue me-3">Web Design</span>
                                                <span class="badge badge-purple-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-28.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-29.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-30.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-item-hover shadow-sm rounded p-3">
                                    <div class="row align-items-center row-gap-3">
                                        <div class="col-md-7">
                                            <div class="todo-inbox-check d-flex align-items-center flex-wrap row-gap-3 todo-strike-content">
                                                <span class="me-2 d-flex align-items-center"><i class="ti ti-grid-dots text-dark"></i></span>
                                                <div class="form-check form-check-md me-2">
                                                    <input class="form-check-input" type="checkbox" checked="">
                                                </div>
                                                <span class="me-2 rating-select d-flex align-items-center"><i class="ti ti-star"></i></span>
                                                <div class="strike-info">
                                                    <h4 class="fs-14 text-truncate">Patient and Doctor video conferencing</h4>
                                                </div>
                                                <span class="badge bg-transparent-dark text-dark rounded-pill ms-2"><i class="ti ti-calendar me-1"></i>15 Jan 2025</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="d-flex align-items-center justify-content-md-end flex-wrap row-gap-3">
                                                <span class="badge badge-pink me-3">Research</span>
                                                <span class="badge badge-purple-transparent d-flex align-items-center me-3"><i class="fas fa-circle fs-6 me-1"></i>Inprogress</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list-stacked avatar-group-sm">
                                                            <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-18.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-01.jpg" alt="img">
															</span>
                                                        <span class="avatar avatar-rounded">
																<img class="border border-white" src="https://smarthr.dreamstechnologies.com/html/template/assets/img/profiles/avatar-14.jpg" alt="img">
															</span>
                                                    </div>
                                                    <div class="dropdown ms-2">
                                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#edit_task"><i class="ti ti-edit me-2"></i>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="ti ti-trash me-2"></i>Delete</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#view_todo"><i class="ti ti-eye me-2"></i>View</a>
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
                    </div>
                    <div class="text-center mb-4">
                        <a href="#" class="btn btn-primary"><i class="ti ti-loader me-1"></i>Load More</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
            <p class="mb-0">2014 - 2025 &copy; SmartHR.</p>
            <p>Designed &amp; Developed By <a href="javascript:void(0);" class="text-primary">Dreams</a></p>
        </div>


    <!-- Add Task -->
    <div class="modal fade" id="add_task">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Task  </h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
                <form action="https://smarthr.dreamstechnologies.com/html/template/tasks.html">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Due Date</label>
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
                                    <label class="form-label">Project</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Office Management</option>
                                        <option>Clinic Management </option>
                                        <option>Educational Platform</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label me-2">Team Members</label>
                                    <input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput" name="Label" value="Jerald,Andrew,Philip,Davis">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tag</label>
                                    <input class="input-tags form-control" placeholder="Add new" type="text" data-role="tagsinput"  name="Label" value="Collab,Rated">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Inprogress</option>
                                        <option>Completed</option>
                                        <option>Pending</option>
                                        <option>Onhold</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Priority</label>
                                    <select class="select">
                                        <option>Select</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Who Can See this Task?</label>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label text-dark" for="flexRadioDefault1">
                                            Public
                                        </label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="">
                                        <label class="form-check-label text-dark" for="flexRadioDefault2">
                                            Private
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked="">
                                        <label class="form-check-label text-dark" for="flexRadioDefault3">
                                            Admin Only
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Descriptions</label>
                                    <div class="summernote"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Upload Attachment</label>
                                <div class="bg-light rounded p-2">
                                    <div class="profile-uploader border-bottom mb-2 pb-2">
                                        <div class="drag-upload-btn btn btn-sm btn-white border px-3">
                                            Select File
                                            <input type="file" class="form-control image-sign" multiple="">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="fs-12 fw-medium me-1">Logo.zip</h6>
                                            <span class="badge badge-soft-info">21MB </span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-icon"><i class="ti ti-trash"></i></a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h6 class="fs-12 fw-medium me-1">Files.zip</h6>
                                            <span class="badge badge-soft-info">25MB </span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-icon"><i class="ti ti-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add New Task</button>
                    </div>
                </form>
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
