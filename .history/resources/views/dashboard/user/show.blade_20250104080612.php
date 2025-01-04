@extends('dashboard.layouts.master')

@section('content')
 <!-- Page Wrapper -->
 <div class="page-wrapper">
    <div class="content">

        <!-- Breadcrumb -->
        <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
            <div class="my-auto mb-2">
                <h6 class="fw-medium d-inline-flex align-items-center mb-3 mb-sm-0"><a href=" ">
                    <i class="ti ti-arrow-left me-2"></i>Employee Details</a>
                </h6>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                <div class="mb-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add_bank_satutory" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Bank & Statutory</a>
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
            <div class="col-xl-4 theiaStickySidebar">
                <div class="card card-bg-1">
                    <div class="card-body p-0">
                        <span class="avatar avatar-xl avatar-rounded border border-2 border-white m-auto d-flex mb-2">
                            <img src=" " class="w-auto h-auto" alt="Img">
                        </span>
                        <div class="text-center px-3 pb-3 border-bottom">
                            <div class="mb-3">
                                <h5 class="d-flex align-items-center justify-content-center mb-1">Stephan Peralt<i class="ti ti-discount-check-filled text-success ms-1"></i></h5>
                                <span class="badge badge-soft-dark fw-medium me-2">
                                    <i class="ti ti-point-filled me-1"></i>Software Developer
                                </span>
                                <span class="badge badge-soft-secondary fw-medium">10+ years of Experience</span>
                            </div>
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-id me-2"></i>
                                        Client ID
                                    </span>
                                    <p class="text-dark">CLT-0024</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-star me-2"></i>
                                        Team
                                    </span>
                                    <p class="text-dark">UI/UX Design</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-calendar-check me-2"></i>
                                        Date Of Join
                                    </span>
                                    <p class="text-dark">1st Jan 2023</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="d-inline-flex align-items-center">
                                        <i class="ti ti-calendar-check me-2"></i>
                                        Report Office
                                    </span>
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-sm avatar-rounded me-2">
                                            <img src=" " alt="Img">
                                        </span>
                                        <p class="text-gray-9 mb-0">Doglas Martini</p>
                                    </div>
                                </div>
                                <div class="row gx-2 mt-3">
                                    <div class="col-6">
                                        <div>
                                            <a href="#" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#edit_employee"><i class="ti ti-edit me-1"></i>Edit Info</a>
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
                                <p class="text-dark">(163) 2459 315</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-mail-check me-2"></i>
                                    Email
                                </span>
                                <a href="javascript:void(0);" class="text-info d-inline-flex align-items-center"><span class="__cf_email__" data-cfemail="4b3b2e39392a273f7a790b2e332a263b272e65282426">[email&#160;protected]</span><i class="ti ti-copy text-dark ms-2"></i></a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-gender-male me-2"></i>
                                    Gender
                                </span>
                                <p class="text-dark text-end">Male</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-cake me-2"></i>
                                    Birdthday
                                </span>
                                <p class="text-dark text-end">24th July 2000</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-map-pin-check me-2"></i>
                                    Address
                                </span>
                                <p class="text-dark text-end">1861 Bayonne Ave, <br> Manchester, NJ, 08759</p>
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
                                <p class="text-dark">QRET4566FGRT</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-calendar-x me-2"></i>
                                    Passport Exp Date
                                </span>
                                <p class="text-dark text-end">15 May 2029</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-gender-male me-2"></i>
                                    Nationality
                                </span>
                                <p class="text-dark text-end">Indian</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-bookmark-plus me-2"></i>
                                    Religion
                                </span>
                                <p class="text-dark text-end">Christianity</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-hotel-service me-2"></i>
                                    Marital status
                                </span>
                                <p class="text-dark text-end">Yes</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-briefcase-2 me-2"></i>
                                    Employment of spouse
                                </span>
                                <p class="text-dark text-end">No</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="d-inline-flex align-items-center">
                                    <i class="ti ti-baby-bottle me-2"></i>
                                    No. of children
                                </span>
                                <p class="text-dark text-end">2</p>
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
             
        </div>
    </div>
    <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
        <p class="mb-0">2014 - 2025 &copy; SmartHR.</p>
        <p>Designed &amp; Developed By <a href="#" class="text-primary">Dreams</a></p>
    </div>
</div>
<!-- /Page Wrapper -->


@endsection

