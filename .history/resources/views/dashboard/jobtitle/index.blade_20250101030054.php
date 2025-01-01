@extends('dashboard.layouts.master')
@extends('dashboard.layouts.header')
@section('css')
/* Add margin to the buttons inside the .btn-group */
.btn-group .btn {
    margin-right: 12px; /* Adjust space between buttons */
}

/* Add margin to the table cell itself */
.text-right {
    margin-right: 15px; /* Adjust the margin around the whole <td> */
}

/* Optional: Adjust height of buttons */
.btn-sm {
    height: 40px; /* Increase button height */
    padding: 10px 15px; /* Adjust padding for consistent size */
}

/* Optional: Adjust font size of icons */
.btn i {
    font-size: 16px; /* Adjust icon size */
}

@endsection
@section('page-title')
    {{ __('Job Titles') }}
@endsection

@section('content')
    <div class="row">
        <!-- Create New Button (Triggers Modal) -->
        <div class="d-flex justify-content-end mb-3">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addJobTitleModal" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        </div>

        <!-- Card for Job Titles List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Job Titles List') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Name_ar') }}</th>
                                    <th width="200px">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobtitles as $jobtitle)
                                    <tr>
                                        <td>{{ $jobtitle->name }}</td>
                                        <td>{{ $jobtitle->name_ar }}</td>
                                        <td class="text-right" style="margin-right: 15px;">
                                            <div class="btn-group" role="group">
                                                @can('Edit Employee')
                                                    <a href="{{ URL::to('jobtitle/'.$jobtitle->id.'/edit') }}" class="btn btn-outline-success btn-sm me-3" data-toggle="tooltip" data-original-title="{{ __('Edit') }}">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                @endcan

                                                @can('Delete Employee')
                                                    <form action="{{ route('jobtitle.destroy', $jobtitle->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ __('Are you sure? This action cannot be undone.') }}');">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="{{ __('Delete') }}">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
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

    <!-- Add Job Title Modal -->
    <div class="modal fade" id="addJobTitleModal" tabindex="-1" aria-labelledby="addJobTitleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJobTitleModalLabel">{{ __('Add New Job Title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Form for Creating Job Title -->
                {{ Form::open(array('url' => 'jobtitle', 'method' => 'post')) }}
                <div class="modal-body">
                    <div class="row">
                        <!-- Job Title Name -->
                        <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('name', __('Name'), ['class' => 'form-control-label']) }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')]) }}
                                @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Job Title Name Arabic -->
                        <div class="col-12">
                            <div class="form-group">
                                {{ Form::label('name_ar', __('Name_ar'), ['class' => 'form-control-label']) }}
                                {{ Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Name in Arabic')]) }}
                                @error('name_ar')
                                <span class="invalid-name_ar" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
                    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary" data-bs-dismiss="modal">
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    // Optional: Submit form via AJAX for a smooth UX (No page reload)
    $('#createJobTitleForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    $('#addJobTitleModal').modal('hide');
                    location.reload(); // Refresh page to show the new Job Title
                } else {
                    alert(response.message); // Show error message if needed
                }
            },
            error: function() {
                alert('{{ __('Something went wrong. Please try again.') }}');
            }
        });
    });
</script>
@endsection
