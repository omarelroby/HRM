@section('content')
    <style>
        .page-wrapper .content {
            min-height: calc(100vh - 105px); /* Full page height */
            background-color: #f8f9fa; /* Light background for contrast */
        }

        #chart-container {
            width: 100%;
            height: auto; /* Dynamically adjust height */
            border: 2px solid #dcdcdc; /* Slightly darker border for contrast */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Spacing inside the container */
            background-color: #ffffff; /* White background for better visibility */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            overflow-x: auto; /* Allow horizontal scrolling for large charts */
        }

        .modal-header {
            background-color: #0d6efd; /* Primary blue header */
            color: #fff; /* White text */
        }

        .modal-content {
            border-radius: 10px; /* Smooth modal corners */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15); /* Shadow for modal */
        }

        .btn-primary {
            background-color: #0d6efd; /* Consistent primary blue */
            border-color: #0d6efd;
        }

        .btn-outline-light {
            color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-outline-light:hover {
            background-color: #0d6efd;
            color: #fff;
        }

    </style>

    <div class="all-button-box row d-flex justify-content-end my-4">
        @can('Create Branch')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg btn-block"
                   data-title="{{__('Create New Structure')}}">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>

    <div id="chart-container"></div>

    <!-- Modal for creating new structure -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Branch') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {{Form::open(array('url'=>'companystructure','method'=>'post'))}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('employee_id',__('Select The Employee'))}}
                                {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2', 'id'=>'employee_id', 'placeholder'=>__('Choose an Employee')))}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('parent',__('Select The Parent'))}}
                                {{Form::select('parent',$structure_tree,null,array('class'=>'form-control select2', 'id'=>'parent', 'placeholder'=>__('Choose a Parent')))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))}}
                                @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('name_ar',__('Name (Arabic)'),['class'=>'form-control-label'])}}
                                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Arabic Name')))}}
                                @error('name_ar')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <button type="button" class="btn btn-outline-light border" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.1.1/js/jquery.orgchart.min.js"
            integrity="sha512-alnBKIRc2t6LkXj07dy2CLCByKoMYf2eQ5hLpDmjoqO44d3JF8LSM4PptrgvohTQT0LzKdRasI/wgLN0ONNgmA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        'use strict';
        (function($){
            $(function() {
                var datascource = {
                    'name': 'Organization',
                    'title': 'Root',
                    'children': @json($structureTree)
                };

                $('#chart-container').orgchart({
                    'data': datascource,
                    'nodeContent': 'title',
                    'pan': true,  // Enable panning
                    'zoom': true  // Enable zooming
                });
            });
        })(jQuery);
    </script>
@endpush
