@extends('dashboard.layouts.master')

@section('content')
<div class="content">
  <div class="row">
      <div class="d-flex justify-content-end mb-3">
          @can('Create User')
              <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#addJobTitleModal" class="btn btn-primary">
                      <i class="fa fa-plus"></i> {{ __('Create') }}
                  </a>
              </div>
          @endcan
      </div>
    <div class="col-12">
      <div class="card user-list-card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="text-center w-100">Users List</h5>
        </div>
        @if (session('success'))
        <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
        @elseif (session('error'))
        <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
        @endif
        <div class="card-body">

          <div class="row">
            @foreach ($users as $user)
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card user-card text-center">
                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="w-100 text-center">

                        <h5 class="card-title mb-0">
                        <span class="avatar avatar-xl flex-shrink-0">
                            <img src="{{$user->avatar?asset(Storage::url($user->avatar)):asset(Storage::url('uploads/avatar/company.png'))}}" class="rounded-circle" alt="img">
                        </span>
                         <a href="{{ route('user.show',$user->id) }}">{{ $user->name }}</a>

                        </h5>

                      </div>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_employee_{{ $user->id }}">
                              <i class="ti ti-edit me-1"></i>Edit
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-url="{{ route('user.destroy', $user->id) }}" data-bs-toggle="modal" data-bs-target="#delete_modal">
                              <i class="ti ti-trash me-1"></i>Delete
                            </a>

                          </li>
                        </ul>
                      </div>
                    </div>

                    <p class="card-text mb-2">{{ $user->type }}</p>
                    <span class="badge bg-pink-transparent fs-10 fw-medium">{{ $user->email ?? '' }}</span>
                    <br />
                    @if($user->is_active)
                      <span class="badge bg-success">ACTIVE</span>
                    @else
                      <span class="badge bg-danger">CLOSE</span>
                    @endif
                  </div>
                </div>
              </div>

              <!-- Edit Modal -->
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
                                <label for="type" class="form-label">User  Type</label>
                                <div class="input-group">
                                    <select class="form-select" id="type" name="role" required>
                                        @foreach ($roles as $role)
                                            <option @if($role->name == $user->type) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
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
<div class="modal fade" id="addJobTitleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addJobTitleModalLabel">{{ __('Add Company User') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {!! Form::open(['route' => 'user.store','method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                @csrf
                <div class="row">

                    <div class="form-group col-lg-6 col-md-6">
                        {!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>

                    <div class="form-group col-lg-6 col-md-6">
                        {!! Form::label('email', __('Email'),['class'=>'form-control-label']) !!}
                        {!! Form::text('email', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>

                    <div class="form-group col-lg-6 col-md-6">
                        {!! Form::label('password', __('Password'),['class'=>'form-control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control','required' => 'required']) !!}
                    </div>

                    @if(\Auth::user()->type != 'super admin')
                        <div class="form-group col-lg-6 col-md-6">
                            <label for="role" class="form-control-label">{{ __('User Role') }}</label>
                            <select name="role" id="role" class="form-control select2" required>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $role->id }}"  >
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="invalid-role" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    @endif
                    @if(\Auth::user()->type == 'super admin')
                        <div class="col-md-6 mb-3">
                            {{ Form::label('logo', __('logo'), ['class' => 'form-control-label']) }}
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
                        <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                        <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
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
{{-- Delete Confirmation Modal --}}
{{-- End Delete Confirmation Modal --}}
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.getElementById('delete_modal');
    const deleteForm = document.getElementById('delete_form');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const deleteUrl = button.getAttribute('data-url'); // Extract the URL from the data-url attribute
        deleteForm.action = deleteUrl; // Update the form action dynamically
    });
});
</script>
@endsection
