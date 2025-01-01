@extends('dashboard.layouts.master')
@extends('dashboard.layouts.header')
@section('css')
<script>
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

</script>
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
                                        @extends('dashboard.layouts.master')

                                        @section('content')
                                            <div class="row">
                                                <!-- Button for creating a new nationality -->
                                                <div class="all-button-box row d-flex justify-content-end mb-4">
                                                    @can('Create Employee')
                                                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                                                            <a href="#" data-url="{{ route('nationality.create') }}"
                                                               class="btn btn-primary btn-icon-only width-auto"
                                                               data-ajax-popup="true"
                                                               data-title="{{ __('Create New') }}"
                                                               data-toggle="modal" data-target="#createNationalityModal">
                                                                <i class="fa fa-plus"></i> {{ __('Create') }}
                                                            </a>
                                                        </div>
                                                    @endcan
                                                </div>

                                                <!-- Nationalities List Table -->
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>{{ __('Nationalities List') }}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered table-hover dataTables">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{ __('Name') }}</th>
                                                                            <th>{{ __('Name_ar') }}</th>
                                                                            <th width="200px">{{ __('Action') }}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="font-style">
                                                                        @foreach ($laborcompanies as $laborcompany)
                                                                            <tr>
                                                                                <td>{{ $laborcompany->name }}</td>
                                                                                <td>{{ $laborcompany->name_ar }}</td>
                                                                                <td class="text-right">
                                                                                    <!-- Edit Button -->
                                                                                    @can('Edit Employee')
                                                                                        <a href="{{ URL::to('labor_companies/'.$laborcompany->id.'/edit') }}"
                                                                                           class="btn btn-success btn-icon-only"
                                                                                           data-url="{{ URL::to('labor_companies/'.$laborcompany->id.'/edit') }}"
                                                                                           data-size="lg"
                                                                                           data-ajax-popup="true"
                                                                                           data-title="{{ __('Edit') }}"
                                                                                           data-toggle="tooltip"
                                                                                           data-original-title="{{ __('Edit') }}">
                                                                                            <i class="fa fa-pencil-alt"></i>
                                                                                        </a>
                                                                                    @endcan

                                                                                    <!-- Delete Button -->
                                                                                    @can('Delete Employee')
                                                                                        <a href="#"
                                                                                           class="btn btn-danger btn-icon-only"
                                                                                           data-toggle="tooltip"
                                                                                           data-original-title="{{ __('Delete') }}"
                                                                                           onclick="if(confirm('{{ __('Are you sure? This action cannot be undone.') }}')) {
                                                                                                        document.getElementById('delete-form-{{ $laborcompany->id }}').submit();
                                                                                                    }">
                                                                                            <i class="fas fa-trash-alt"></i>
                                                                                        </a>

                                                                                        <!-- Form for Delete -->
                                                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['labor_companies.destroy', $laborcompany->id], 'id' => 'delete-form-' . $laborcompany->id, 'style' => 'display:none;']) !!}
                                                                                        {!! Form::close() !!}
                                                                                    @endcan
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

                                            <!-- Modal for Create Nationality -->
                                            <div class="modal fade" id="createNationalityModal" tabindex="-1" role="dialog" aria-labelledby="createNationalityModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="createNationalityModalLabel">{{ __('Create Nationality') }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ Form::open(['url' => 'labor_companies', 'method' => 'post']) }}
                                                            <div class="row">
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

                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        {{ Form::label('name_ar', __('Name_ar'), ['class' => 'form-control-label']) }}
                                                                        {{ Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Name in Arabic')]) }}
                                                                        @error('name_ar')
                                                                            <span class="invalid-name" role="alert">
                                                                                <strong class="text-danger">{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-12 d-flex justify-content-between">
                                                                    <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
                                                                    <input type="button" value="{{ __('Cancel') }}" class="btn btn-white" data-dismiss="modal">
                                                                </div>
                                                            </div>
                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endsection




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
