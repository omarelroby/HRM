@extends('dashboard.layouts.master')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card user-list-card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="text-center w-100">Users List</h5>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($users as $user)
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card user-card text-center">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="w-100 text-center">
                        <h5 class="card-title mb-0">
                          <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">{{ $user->name }}</a>
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
                            <a class="dropdown-item" href="javascript:void(0);" data-url="{{ route('employee.destroy', $employee->id) }}" data-bs-toggle="modal" data-bs-target="#delete_modal">
                              <i class="ti ti-trash me-1"></i>Delete
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal"
                            data-url="{{ route('employee.destroy', $employee->id) }}" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                            </button>
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
@endsection
{{-- Delete Confirmation Modal --}}
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
{{-- End Delete Confirmation Modal --}}
