@extends('dashboard.layouts.master')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card user-list-card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5>Users List</h5>
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">
                  <input type="checkbox" class="form-check-input">
                </th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>
                    <input type="checkbox" class="form-check-input">
                  </td>
                  <td>
                    <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">{{ $user->name }}</a>
                  </td>
                  <td>{{ $user->type }}</td>
                  <td>{{ $user->email ?? '' }}</td>
                  <td>
                    @if($user->is_active)
                      <span class="badge bg-success">ACTIVE</span>
                    @else
                      <span class="badge bg-danger">CLOSE</span>
                    @endif
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit_employee">
                            <i class="ti ti-edit me-1"></i>Edit
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                            <i class="ti ti-trash me-1"></i>Delete
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
