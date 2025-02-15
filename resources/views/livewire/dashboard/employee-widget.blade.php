<div class="col-xxl-4 col-xl-6 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
            <h5 class="mb-2">Employees</h5>
            <a href="{{ route('employee.index') }}" class="btn btn-light btn-md mb-2">View All</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-nowrap mb-0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0);" class="avatar">
                                        {{--                                        Set path to emplyees profile here--}}
                                        <img src="assets/img/users/user-32.jpg" class="img-fluid rounded-circle"
                                             alt="img">
                                    </a>
                                    <div class="ms-2">
                                        <h6 class="fw-medium"><a href="javascript:void(0);">{{ $employee->name }}</a>
                                        </h6>
                                        <span class="fs-12">{{ $employee->dob }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-secondary-transparent badge-xs">
                                    {{ $employee->department->name }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border-0 text-center bg-transparent-danger py-3" colspan="2">
                                <span class="badge badge-pink-transparent badge-xs">Employees list is empty</span>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
