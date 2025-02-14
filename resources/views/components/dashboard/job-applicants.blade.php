<div class="col-xxl-4 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Jobs Applicants</h5>
            <a href="{{ route('job.index') }}" class="btn btn-light btn-md mb-2">View All</a>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs tab-style-1 nav-justified d-sm-flex d-block p-0 mb-4" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium" data-bs-toggle="tab" data-bs-target="#openings" aria-current="page"
                       href="#openings" aria-selected="true" role="tab">Open Positions</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium active" data-bs-toggle="tab" data-bs-target="#applicants"
                       href="#applicants" aria-selected="false" tabindex="-1" role="tab">Job Applicants</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade" id="openings">
                    @forelse($openJobs as $job)
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <a href="#" class="avatar overflow-hidden flex-shrink-0 bg-gray-100">
                                    <img src="assets/img/icons/apple.svg" class="img-fluid rounded-circle w-auto h-auto"
                                         alt="img">
                                </a>
                                <div class="ms-2 overflow-hidden">
                                    <p class="text-dark fw-medium text-truncate mb-0"><a href="javascript:void(0);">
                                            {{ $job->title }}
                                        </a>
                                    </p>
                                    <span class="fs-12">No of Openings : {{ $job->applicant }} </span>
                                </div>
                            </div>
                            <div class="align-items-center">
                                <span class="badge badge-info badge-xs">
                                            {{ $job->categories->title }}
                                        </span>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="d-flex align-items-center bg-transparent-danger p-2 w-100 justify-content-center">
                                <div class="ms-2 overflow-hidden text-center w-100">
                                    <p class="text-dark w-100 mb-0 text-center">No Open Positions</p>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="tab-pane fade show active" id="applicants">
                    @forelse($jobApplicants as $applicant)
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <a href="#" class="avatar overflow-hidden flex-shrink-0">
                                    <img src="{{ $applicant->profile ? $applicant->profile : 'assets/img/users/user-09.jpg' }}"
                                         class="img-fluid rounded-circle" alt="img">


                                </a>
                                <div class="ms-2 overflow-hidden">
                                    <p class="text-dark fw-medium text-truncate mb-0"><a href="#">{{ $applicant->name }}</a>
                                    </p>
                                    <span class="fs-13 d-inline-flex align-items-center">{{ $applicant->skill }}<i
                                            class="ti ti-circle-filled fs-4 mx-2 text-primary"></i>{{ $applicant->country }}</span>
                                </div>
                            </div>
                            <span class="badge badge-secondary badge-xs">{{ $applicant->job->title }}</span>
                        </div>
                    @empty
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="d-flex align-items-center bg-transparent-danger p-2 w-100 justify-content-center">
                                <div class="ms-2 overflow-hidden text-center w-100">
                                    <p class="text-dark w-100 mb-0 text-center">No Applicants</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>