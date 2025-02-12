@extends('dashboard.layouts.master')

@push('css')
    <style>
        .btn-outline-newprimary {
            color: #08c65b;
            border-color: #08c65b;
        }

        .btn-outline-newprimary:hover,
        .btn-outline-newprimary:focus,
        .btn-outline-newprimary:active {
            background-color: #08c65b;
            color: white;
            border-color: #08c65b;
        }
    </style>

    <style>
        .modal-footer .equal-width {
            width: 48%; /* Adjust as needed */
        }
    </style>
    <style>
        /* Modal Styling */
        .modal-content {
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            padding: 15px 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }

        .modal-body {
            padding: 20px;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        /* User Stats */
        .user-stats {
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .user-stats h6 {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
        }

        .user-stats p {
            font-size: 0.9rem;
            color: #555;
            margin: 0;
        }

        /* User List */
        .user-list {
            margin-top: 20px;
        }

        .user-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .user-item:last-child {
            border-bottom: none;
        }

        .user-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-item label {
            font-size: 0.9rem;
            font-weight: 500;
            color: #333;
            margin: 0;
        }

        /* Switch Styling */
        .form-check-input {
            width: 40px;
            height: 20px;
        }

        .form-check-input:checked {
            background-color: #08c65b;
            border-color: #08c65b;
        }
    </style>
@endpush
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="content">
        <div class="row">
            <div class="d-flex justify-content-end mb-3">
                @can('Create User')
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addJobTitleModal" class="btn btn-outline-newprimary btn-lg">
                            <i class="fa fa-plus"></i> {{ __('Create') }}
                        </a>
                    </div>
                @endcan
            </div>
            <div class="col-12">
                <div class="card user-list-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="text-center w-100">{{ __('Users List') }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @foreach ($users as $user)
                                <div class="col-xl-3">
                                    <div class="card text-center">
                                        <div class="card-header border-0 pb-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0">
                                                    <div class="badge p-2 px-3" style="background-color: #08c65b; font-weight: bold; font-size: 16px;">
                                                        {{ $user->getPlan->name ?? '' }}
                                                    </div>
                                                </h6>
                                                <div class="card-header-right">
                                                    <div class="btn-group card-option">
                                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                                style="color: #6cc752; border-color: #6cc752; background-color: transparent;"
                                                                onmouseover="this.style.backgroundColor='#6cc752'; this.style.color='white';"
                                                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#6cc752';"
                                                                onfocus="this.style.backgroundColor='#6cc752'; this.style.color='white';"
                                                                onblur="this.style.backgroundColor='transparent'; this.style.color='#6cc752';">
                                                            <i class="feather icon-more-vertical" style="color: #6cc752;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_employee_{{ $user->id }}">
                                                                    <i class="ti ti-edit me-1"></i>Edit
                                                                </a>
                                                            </li>
                                                            <a href="{{ route('user.loginAsCompany', $user->id) }}" class="dropdown-item" data-bs-original-title="Login As Company">
                                                                <i class="ti ti-replace"></i>
                                                                <span> Login As Company</span>
                                                            </a>


                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);" data-url="{{ route('user.destroy', $user->id) }}" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                    <i class="ti ti-trash me-1"></i>Delete
                                                                </a>
                                                            </li>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="avatar">
                                                <a href="{{ $user->avatar ? asset(Storage::url($user->avatar)) : asset(Storage::url('uploads/avatar/company.png')) }}" target="_blank">
                                                    <img src="{{ $user->avatar ? asset(Storage::url($user->avatar)) : asset(Storage::url('uploads/avatar/company.png')) }}" class="img-fluid rounded border-2 border border-primary" width="300px" style="aspect-ratio: 1 / 1; width: 100%; object-fit: cover;">
                                                </a>
                                            </div>
                                            <h4 class="mt-2">{{ $user->name }}</h4>
                                            <small>{{ $user->email ?? '' }}</small>
                                            <div class="mb-0 mt-2">
                                                <div class="p-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-6 text-center Id">
                                                            <a class="btn btn-outline-newprimary w-100"
                                                               data-url="{{ route('plans.list', $user->id) }}"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#PlanModal"
                                                               onclick="loadPlans('{{ route('plans.list', $user->id) }}')">
                                                                {{__('Upgrade Plan')}}
                                                            </a>
                                                        </div>
                                                        <div class="col-6 text-center Id">
                                                            <a href="#" class="btn btn-outline-newprimary w-100"
                                                               data-url="#"
                                                               data-size="lg"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#AdminHubModal"
                                                               data-title="AdminHub">
                                                                {{__('AdminHub')}}
                                                            </a>
                                                        </div>

                                                        <div class="col-6 text-start mt-3">
                                                            <h6 class="mb-0 px-3">{{\App\Models\User::where('created_by',$user->id)->get()->count()}}</h6>
                                                            <p class="text-muted text-sm mb-0">{{__('Users')}}</p>
                                                        </div>
                                                        <div class="col-6 text-end mt-3">
                                                            <h6 class="mb-0 px-4">{{\App\Models\Employee::where('created_by',$user->id)->get()->count()}}</h6>
                                                            <p class="text-muted text-sm mb-0">{{__('Employees')}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center pb-2">
                                            <span class="text-dark font-weight-900" style="font-size: 18px;font-weight: bold;">
                                                Plan Expired: {{ $user->getPlan->duration ?? 'N/A' }}
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="edit_employee_{{ $user->id }}" tabindex="-1" aria-labelledby="editEmployeeLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editEmployeeLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="type" class="form-label">User Type</label>
                                                        <div class="input-group">
                                                            <select class="form-select" disabled id="type" name="role" required>
                                                                @foreach ($roles as $role)
                                                                    <option @if($role->name == $user->type) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Change Password Section -->
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">New Password</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary equal-width" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary equal-width">Save changes</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="AdminHubModal" tabindex="-1" aria-labelledby="PlanModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">


                                            <div class="modal-body">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        @if(app()->getLocale()=='ar')
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <h5 class="modal-title" id="exampleModalLabel">{{__('AdminHub')}}</h5>

                                                        @else
                                                            <h5 class="modal-title" id="exampleModalLabel">{{__('AdminHub')}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                        @endif
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <!-- User Stats Card -->
                                                                <div class="card mb-3">
                                                                    <div class="card-body">
                                                                        <div class="user-stats">
                                                                            <div>
                                                                                <h6>Total Users</h6>
                                                                                <p><i class="ti ti-users text-warning"></i> <span class="total_users">{{\App\Models\User::where('created_by',$user->id)->get()->count()}} </span></p>
                                                                            </div>
                                                                            <div>
                                                                                <h6>Active Users</h6>
                                                                                <p><i class="ti ti-users text-primary"></i> <span class="active_users">{{\App\Models\User::where('created_by',$user->id)->where('is_active',1)->get()->count()}} </span></p>
                                                                            </div>
                                                                            <div>
                                                                                <h6>Disabled Users</h6>
                                                                                <p><i class="ti ti-users text-danger"></i> <span class="disable_users"> {{\App\Models\User::where('created_by',$user->id)->where('is_active',0)->get()->count()}}</span></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- User List -->
                                                                <div class="user-list">
{{--                                                                    @foreach($users as $user)--}}
{{--                                                                        <div class="user-item">--}}
{{--                                                                            <div class="d-flex align-items-center">--}}
{{--                                                                                <a href="{{ $user->avatar ? asset(Storage::url($user->avatar)) : asset('uploads/avatar/avatar.png') }}" target="_blank">--}}
{{--                                                                                    <img src="{{ $user->avatar ? asset(Storage::url($user->avatar)) : asset('uploads/avatar/avatar.png') }}" alt="{{ $user->name }}">--}}
{{--                                                                                </a>--}}
{{--                                                                                <label for="user">{{ $user->name }}</label>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div>--}}
{{--                                                                                <div class="form-check form-switch">--}}
{{--                                                                                    <input type="checkbox" class="form-check-input is_disable" data-id="{{ $user->id }}" data-company="{{ $company->id }}" {{ $user->is_active ? 'checked' : '' }}>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    @endforeach--}}
                                                                </div>
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
                </div>
            </div>
        </div>
    </div>

    <!-- Plan Modal -->
    <div class="modal fade" id="PlanModal" tabindex="-1" aria-labelledby="PlanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if(app()->getLocale()=='ar')
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="PlanModalLabel">{{__('Upgrade Plan')}}</h5>
                    @else
                        <h5 class="modal-title" id="PlanModalLabel">{{__('Upgrade Plan')}}</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    @endif

                </div>
                <div class="modal-body">
                    <div id="planContainer">
                        <!-- Plans will be loaded here -->
                        <div class="text-center">
                            <i class="fa fa-spinner fa-spin"></i> Loading...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addJobTitleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="addJobTitleModalLabel">{{ __('Add Company User') }}</h5>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'user.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6">
                            {!! Form::label('name', __('Name'), ['class' => 'form-control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            {!! Form::label('email', __('Email'), ['class' => 'form-control-label']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            {!! Form::label('password', __('Password'), ['class' => 'form-control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>
                        @if(\Auth::user()->type != 'super admin')
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="role" class="form-control-label">{{ __('User Role') }}</label>
                                <select name="role" id="role" class="form-control select2" required>
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @if(\Auth::user()->type == 'super admin')
                            <div class="col-md-6 mb-3">
                                {{ Form::label('logo', __('Logo'), ['class' => 'form-control-label']) }}
                                <div class="input-group">
                                    <input type="file" class="form-control" name="logo" id="logo" aria-label="Upload logo" required>
                                    <label for="logo" class="input-group-text bg-primary text-white">
                                        <i class="fas fa-upload me-2"></i>{{ __('Choose File') }}
                                    </label>
                                </div>
                                <small class="form-text text-muted">{{ __('Allowed file types: PNG, JPEG') }}</small>
                            </div>
                        @endif
                        <div class="col-md-12 my-2">
                            <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                    <i class="ti ti-trash-x fs-36"></i>
                </span>
                    <h4 class="mb-1">Confirm Delete</h4>
                    <p class="mb-3">Are you sure you want to delete this item? This action cannot be undone.</p>
                    <form id="delete_form" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function loadPlans(url) {
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    // Insert the response into the modal body or specific container
                    $('#planContainer').html(response);

                    // Optionally show the modal after content is loaded
                    $('#PlanModal').modal('show');
                },
                error: function (response) {
                    // Handle error and display a message
                    $('#planContainer').html('<p class="text-danger">Failed to load plans. Please try again.</p>');
                }
            });
        }
    </script>

    <script>


        document.addEventListener('DOMContentLoaded', function () {
            const deleteModal = document.getElementById('delete_modal');
            const deleteForm = document.getElementById('delete_form');

            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const deleteUrl = button.getAttribute('data-url');
                deleteForm.action = deleteUrl;
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.all.min.js"></script>

    <script>
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        Swal.fire({
            icon: 'error',
            title: '@lang('efb.missing_or_wrong_data')',
            text: '{{ $error }}',
        });
        @endforeach
        @endif

        @if(Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
        });
        @endif

        @if(Session::has('wrong'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ session('wrong') }}",
        });
        @endif

        @if(Session::has('info'))
        Swal.fire({
            icon: 'info',
            title: 'Information',
            text: "{{ session('info') }}",
        });
        @endif

        @if(Session::has('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: "{{ session('warning') }}",
        });
        @endif
    </script>
@endsection

