@extends('dashboard.layouts.master')

@section('content')
<div class="row">
    @forelse($employees as $employee)
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <div class="product-imitation">
                        <img style="width:100px;height:100px;" src="{{!empty($employee->user->avatar) ? asset(Storage::url('uploads/avatar')).'/'.$employee->user->avatar : asset(Storage::url('uploads/avatar')).'/avatar.png'}}" class="avatar rounded-circle avatar-xl">
                    </div>
                    <div class="product-desc">
                        <h5>{{ $employee->name }}</h5>
                        <div class="small m-t-xs">
                            <div class="sal-right-card">
                                <span class="badge badge-pill badge-blue">{{ !empty($employee->designation)?$employee->designation->name:'' }}</span>
                            </div>

                            @can('Show Employee Profile')
                                <a href="{{route('employee.show',\Illuminate\Support\Facades\Crypt::encrypt($employee->id))}}">{{ \Auth::user()->employeeIdFormat($employee->employee_id) }}</a>
                            @else
                                <a href="#">{{ \Auth::user()->employeeIdFormat($employee->employee_id) }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="text-center">
                <h6>{{__('there is no employee')}}</h6>
            </div>
        </div>
    @endforelse
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
