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
          <div class="row">
            @foreach ($users as $user)
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card user-card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <h5 class="card-title mb-0 text-center">
                        <a href="https://smarthr.dreamstechnologies.com/html/template/employee-details.html">{{ $user->name }}</a>
                      </h5>
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
                    </div>
                    <p class="card-text mb-2 text-center">{{ $user->type }}</p>
                    <p class="badge bg-pink-transparent fs-10 fw-medium text-center">{{ $user->type }}</p>
                    <p class="card-text mb-2 text-center">{{ $user->type }}</p>
                    <span class="badge bg-pink-transparent fs-10 fw-medium text-center">{{ $user->email ?? '' }}</span>
                    @if($user->is_active)
                      <span class="badge bg-success text-center">ACTIVE</span>
                    @else
                      <span class="badge bg-danger text-center">CLOSE</span>
                    @endif
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
