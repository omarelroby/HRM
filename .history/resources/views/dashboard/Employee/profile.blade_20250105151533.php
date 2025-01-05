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
                                <a href="{{ url('/user/' . $user->id) }}">{{ $user->name }}</a>
                            </h5>
                        </div>

                    </div>
                    <p class="card-text mb-2">{{ $user->type }}</p>
                    <span class="badge bg-pink-transparent fs-10 fw-medium">{{ $user->email ?? '' }}</span>
                    <br />
                    @if($user->is_active)
                      <span class="badge bg-secondary">ACTIVE</span>
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
