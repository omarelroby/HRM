@extends('dashboard.layouts.master')

@section('content')
 <!-- Page Wrapper -->
    <div class="card">
        <div class="card-header">
            <h2>Employee Profile</h2>
        </div>
        <div class="content" dir="rtl">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-bg-1">
                        <div class="card-body p-0">
                            <span class="avatar avatar-xl avatar-rounded border border-2 border-white m-auto d-flex mb-2">
                                <img src=" " class="w-auto h-auto" alt="Img">
                            </span>
                            <div class="text-center px-3 pb-3 border-bottom">
                                <div class="mb-3">
                                    <h5 class="d-flex align-items-center justify-content-center mb-1">{{ $employee->name ?? '' }}<i class="ti ti-discount-check-filled text-success ms-1"></i></h5>
                                    <span class="badge badge-soft-dark fw-medium me-2">
                                        <i class="ti ti-point-filled me-1"></i>{{ $employee->jobtitle->name??'' }}
                                    </span>
                                    <span class="badge badge-soft-secondary fw-medium">{{ $employee->department->name ?? 'Deprment' }}</span>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="d-inline-flex align-items-center">
                                            <i class="ti ti-id me-2"></i>
                                            Client ID
                                        </span>
                                        <p class="text-dark">{{ \Auth::user()->employeeIdFormat($employee->employee_id) }} </p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="d-inline-flex align-items-center">
                                            <i class="ti ti-star me-2"></i>
                                            Team
                                        </span>
                                        <p class="text-dark">{{ $employee->department->name ?? 'N/A' }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="d-inline-flex align-items-center">
                                            <i class="ti ti-calendar-check me-2"></i>
                                            Date Of Join
                                        </span>
                                        <p class="text-dark">{{ $employee->Join_date_gregorian ??'N/A' }}</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="d-inline-flex align-items-center">
                                            <i class="ti ti-calendar-check me-2"></i>
                                            Designations
                                        </span>
                                        <div class="d-flex align-items-center">
                                            <p class="text-gray-9 mb-0">{{ $employee->designation->name ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="row gx-2 mt-3">
                                        <div class="col-6">
                                            <div>
                                                <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-dark w-100" target="_blank"><i class="ti ti-edit me-1"></i>Edit Info</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <a href=" " class="btn btn-primary w-100"><i class="ti ti-message-heart me-1"></i>Message</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6>Basic information</h6>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-phone me-2"></i>
                                        Phone
                                    </span>
                                    <p class="text-dark">{{ $employee->phone ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-mail-check me-2"></i>
                                        Email
                                    </span>
                                    <p class="text-dark">{{ $employee->email ?? 'N/A' }}</p>

                                 </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-gender-male me-2"></i>
                                        Gender
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->gender ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-cake me-2"></i>
                                        Birdthday
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->dob ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-map-pin-check me-2"></i>
                                        Address
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->address ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="p-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6>Personal Information</h6>
                                    <a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_personal"><i class="ti ti-edit"></i></a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-e-passport me-2"></i>
                                        Passport No
                                    </span>
                                    <p class="text-dark">{{ $employee->passport_number ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-calendar-x me-2"></i>
                                        Passport Exp Date
                                    </span>
                                    <p class="text-dark text-end">
                                    <p class="text-dark">{{ $employee->passport_issuance_expirydate_gregorian ?? 'N/A' }}</p>
                                </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-gender-male me-2"></i>
                                        Nationality
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->nationality->name ?? 'N/A' }}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-bookmark-plus me-2"></i>
                                        Religion
                                    </span>
                                    <p class="text-dark text-end">{{ $employee->religion ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6>Emergency Contact Number</h6>
                        <a href="javascript:void(0);" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_emergency"><i class="ti ti-edit"></i></a>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="d-inline-flex align-items-center">
                                            Primary
                                        </span>
                                        <h6 class="d-flex align-items-center fw-medium mt-1">Adrian Peralt <span class="d-inline-flex mx-1"><i class="ti ti-point-filled text-danger" ></i></span>Father</h6>
                                    </div>
                                    <p class="text-dark">+1 127 2685 598</p>
                                </div>
                            </div>
                            <div class="p-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="d-inline-flex align-items-center">
                                            Secondry
                                        </span>
                                        <h6 class="d-flex align-items-center fw-medium mt-1">Karen Wills <span class="d-inline-flex mx-1"><i class="ti ti-point-filled text-danger" ></i></span>Mother</h6>
                                    </div>
                                    <p class="text-dark">+1 989 7774 787</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div>
                        <div class="tab-content custom-accordion-items">
                            <div class="tab-pane active show" id="bottom-justified-tab1" role="tabpanel">
                                <div class="accordion accordions-items-seperate" id="accordionExample">
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingOne">
                                            <div class="accordion-button">
                                                <div class="d-flex align-items-center flex-fill">
                                                    <h5>About Employee</h5>
                                                    <a href="#" class="btn btn-sm btn-icon ms-auto" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit"></i></a>
                                                    <a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderOne" aria-expanded="false" aria-controls="primaryBorderOne">
                                                        <i class="ti ti-chevron-down fs-18"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="primaryBorderOne" class="accordion-collapse collapse show border-top" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body mt-2">
                                                    As an award winning designer, I deliver exceptional quality work and bring value to your brand! With 10 years of experience and 350+ projects completed worldwide with satisfied customers, I developed the 360° brand approach, which helped me to create numerous brands that are relevant, meaningful and loved.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingTwo">
                                            <div class="accordion-button">
                                                <div class="d-flex align-items-center flex-fill">
                                                    <h5>Bank Information</h5>
                                                    <a href="#" class="btn btn-sm btn-icon ms-auto" data-bs-toggle="modal" data-bs-target="#edit_bank"><i class="ti ti-edit"></i></a>
                                                    <a href="#" class="d-flex align-items-center collapsed collapse-arrow"  data-bs-toggle="collapse" data-bs-target="#primaryBorderTwo" aria-expanded="false" aria-controls="primaryBorderTwo">
                                                        <i class="ti ti-chevron-down fs-18"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="primaryBorderTwo" class="accordion-collapse collapse border-top" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            Bank Name
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">Swiz Intenational Bank</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            Bank account no
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">159843014641</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            IFSC Code
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">ICI24504</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            Branch
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">Alabama USA</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingThree">
                                            <div class="accordion-button">
                                                <div class="d-flex align-items-center justify-content-between flex-fill">
                                                    <h5>Family Information</h5>
                                                    <div class="d-flex">
                                                        <a href="#" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_familyinformation"><i class="ti ti-edit"></i></a>
                                                        <a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderThree" aria-expanded="false" aria-controls="primaryBorderThree">
                                                            <i class="ti ti-chevron-down fs-18"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="primaryBorderThree" class="accordion-collapse collapse border-top" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            Name
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">Hendry Peralt</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            Relationship
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">Brother</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            Date of birth
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">25 May 2014</h6>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="d-inline-flex align-items-center">
                                                            Phone
                                                        </span>
                                                        <h6 class="d-flex align-items-center fw-medium mt-1">+1 265 6956 961</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="accordion-item">
                                                <div class="row">
                                                    <div class="accordion-header" id="headingFour">
                                                        <div class="accordion-button">
                                                            <div class="d-flex align-items-center justify-content-between flex-fill">
                                                                <h5>Education Details</h5>
                                                                <div class="d-flex">
                                                                    <a href="#" class="btn btn-icon btn-sm"  data-bs-toggle="modal" data-bs-target="#edit_education"><i class="ti ti-edit"></i></a>
                                                                    <a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderFour" aria-expanded="false" aria-controls="primaryBorderFour">
                                                                        <i class="ti ti-chevron-down fs-18"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="primaryBorderFour" class="accordion-collapse collapse border-top" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="d-inline-flex align-items-center fw-normal">
                                                                                Oxford University
                                                                            </span>
                                                                            <h6 class="d-flex align-items-center mt-1">Computer Science</h6>
                                                                        </div>
                                                                        <p class="text-dark">2020 - 2022</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="d-inline-flex align-items-center fw-normal">
                                                                                Cambridge University
                                                                            </span>
                                                                            <h6 class="d-flex align-items-center mt-1">Computer Network & Systems</h6>
                                                                        </div>
                                                                        <p class="text-dark">2016- 2019</p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <span class="d-inline-flex align-items-center fw-normal">
                                                                                Oxford School
                                                                            </span>
                                                                            <h6 class="d-flex align-items-center mt-1">Grade X</h6>
                                                                        </div>
                                                                        <p class="text-dark">2012 - 2016</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="accordion-item">
                                                <div class="row">
                                                    <div class="accordion-header" id="headingFive">
                                                        <div class="accordion-button collapsed">
                                                            <div class="d-flex align-items-center justify-content-between flex-fill">
                                                                <h5>Experience</h5>
                                                                <div class="d-flex">
                                                                    <a href="#" class="btn btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#edit_experience"><i class="ti ti-edit"></i></a>
                                                                    <a href="#" class="d-flex align-items-center collapsed collapse-arrow" data-bs-toggle="collapse" data-bs-target="#primaryBorderFive" aria-expanded="false" aria-controls="primaryBorderFive">
                                                                        <i class="ti ti-chevron-down fs-18"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="primaryBorderFive" class="accordion-collapse collapse border-top" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="d-inline-flex align-items-center fw-medium">
                                                                                Google
                                                                            </h6>
                                                                            <span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>UI/UX Developer</span>
                                                                        </div>
                                                                        <p class="text-dark">Jan 2013 - Present</p>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="d-inline-flex align-items-center fw-medium">
                                                                                Salesforce
                                                                            </h6>
                                                                            <span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>Web Developer</span>
                                                                        </div>
                                                                        <p class="text-dark">Dec 2012- Jan 2015</p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="d-inline-flex align-items-center fw-medium">
                                                                                HubSpot
                                                                            </h6>
                                                                            <span class="d-flex align-items-center badge bg-secondary-transparent mt-1"><i class="ti ti-point-filled me-1"></i>Software Developer</span>
                                                                        </div>
                                                                        <p class="text-dark">Dec 2011- Jan 2012</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="contact-grids-tab p-0 mb-3">
                                                <ul class="nav nav-underline" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="info-tab2" data-bs-toggle="tab" data-bs-target="#basic-info2" type="button" role="tab" aria-selected="true">Projects</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="address-tab2" data-bs-toggle="tab" data-bs-target="#address2" type="button" role="tab" aria-selected="false">Assets</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-content" id="myTabContent3">
                                                <div class="tab-pane fade show active" id="basic-info2" role="tabpanel" aria-labelledby="info-tab2" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-6 d-flex">
                                                            <div class="card flex-fill mb-4 mb-md-0">
                                                                <div class="card-body">
                                                                    <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                                                                        <a href="  " class="flex-shrink-0 me-2">
                                                                            <img src=" " alt="Img">
                                                                        </a>
                                                                        <div>
                                                                            <h6 class="mb-1"><a href=" ">World Health</a></h6>
                                                                            <div class="d-flex align-items-center">
                                                                                <p class="mb-0 fs-13">8 tasks</p>
                                                                                <p class="fs-13"><span class="mx-1"><i class="ti ti-point-filled text-primary"></i></span>15 Completed</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div>
                                                                                <span class="mb-1 d-block">Deadline</span>
                                                                                <p class="text-dark">31 July 2025</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div>
                                                                                <span class="mb-1 d-block">Project Lead</span>
                                                                                <a href="#" class="fw-normal d-flex align-items-center">
                                                                                    <img class="avatar avatar-sm rounded-circle me-2" src=" " alt="Img">
                                                                                    Leona
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-flex">
                                                            <div class="card flex-fill mb-0">
                                                                <div class="card-body">
                                                                    <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                                                                        <a href=" " class="flex-shrink-0 me-2">
                                                                            <img src=" " alt="Img">
                                                                        </a>
                                                                        <div>
                                                                            <h6 class="mb-1 text-truncate"><a href=" ">Hospital Administration</a></h6>
                                                                            <div class="d-flex align-items-center">
                                                                                <p class="mb-0 fs-13">8 tasks</p>
                                                                                <p class="fs-13"><span class="mx-1"><i class="ti ti-point-filled text-primary"></i></span>15 Completed</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div>
                                                                                <span class="mb-1 d-block">Deadline</span>
                                                                                <p class="text-dark">31 July 2025</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div>
                                                                                <span class="mb-1 d-block">Project Lead</span>
                                                                                <a href="#" class="fw-normal d-flex align-items-center">
                                                                                    <img class="avatar avatar-sm rounded-circle me-2" src=" " alt="Img">
                                                                                    Leona
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="address2" role="tabpanel" aria-labelledby="address-tab2" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12 d-flex">
                                                            <div class="card flex-fill">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-8">
                                                                            <div class="d-flex align-items-center">
                                                                                <a href=" " class="flex-shrink-0 me-2">
                                                                                    <img src=" " class="img-fluid rounded-circle" alt="img">
                                                                                </a>
                                                                                <div>
                                                                                    <h6 class="mb-1"><a href=" ">Dell Laptop - #343556656</a></h6>
                                                                                    <div class="d-flex align-items-center">
                                                                                            <p><span class="text-primary">AST - 001<i class="ti ti-point-filled text-primary mx-1"></i></span>Assigned on 22 Nov, 2022 10:32AM </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div>
                                                                                <span class="mb-1 d-block">Assigned by</span>
                                                                                <a href="#" class="fw-normal d-flex align-items-center">
                                                                                    <img class="avatar avatar-sm rounded-circle me-2" src=" " alt="Img">
                                                                                    Andrew Symon
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="dropdown ms-2">
                                                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="ti ti-dots-vertical"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                                    <li>
                                                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#asset_info">View Info</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#refuse_msg">Raise Issue </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 d-flex">
                                                            <div class="card flex-fill mb-0">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-8">
                                                                            <div class="d-flex align-items-center">
                                                                                <a href=" " class="flex-shrink-0 me-2">
                                                                                    <img src=" " class="img-fluid rounded-circle" alt="img">
                                                                                </a>
                                                                                <div>
                                                                                    <h6 class="mb-1"><a href=" ">Bluetooth Mouse  - #478878</a></h6>
                                                                                    <div class="d-flex align-items-center">
                                                                                            <p><span class="text-primary">AST - 001<i class="ti ti-point-filled text-primary mx-1"></i></span>Assigned on 22 Nov, 2022 10:32AM </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div>
                                                                                <span class="mb-1 d-block">Assigned by</span>
                                                                                <a href="#" class="fw-normal d-flex align-items-center">
                                                                                    <img class="avatar avatar-sm rounded-circle me-2" src=" " alt="Img">
                                                                                    Andrew Symon
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="dropdown ms-2">
                                                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="ti ti-dots-vertical"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                                    <li>
                                                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#asset_info">View Info</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="javascript:void(0);" class="dropdown-item rounded-1" data-bs-toggle="modal" data-bs-target="#refuse_msg">Raise Issue </a>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
            <p class="mb-0">2014 - 2025 &copy; SmartHR.</p>
            <p>Designed &amp; Developed By <a href="#" class="text-primary">Dreams</a></p>
        </div>
    </div>


<!-- /Page Wrapper -->


@endsection

