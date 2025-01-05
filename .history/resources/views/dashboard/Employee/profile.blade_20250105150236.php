@extends('dashboard.layouts.master')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card user-list-card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="text-center w-100">Employees List</h5>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($employees as $user)
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card user-card text-center">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="w-100 text-center">
                        <h5 class="card-title mb-0">
                          <a href="{{ route('user.show',$user->id) }}">{{ $user->name }}</a>
                        </h5>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical"></i>
                        </button>

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
