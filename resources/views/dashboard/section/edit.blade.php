@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Update Company Policy') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Company Policy Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <!-- Card Header -->
                <div class="card-header  text-white">
                    <h5 class="mb-0">{{ __('Update Department') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    {{Form::model($section,array('route' => array('section.update', $section->id), 'method' => 'PUT')) }}
                    <div class="row ">
                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('sub_dep_id',__('Sub Department'))}}
                                {{Form::select('sub_dep_id',$sub_deps,null,array('class'=>'form-control select2 ','placeholder'=>__('select Branch')))}}
                            </div>
                        </div>
{{--
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('employee_id',__('Employee'))}}
                                {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','id'=>'employee_id','placeholder'=>__('Select Employee')))}}
                            </div>
                        </div> --}}

                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name',__('Name'))}}
                                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Department Name')))}}
                                @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Department Name arabic')))}}
                                @error('name_ar')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                        </div>
                    </div>
                    {{Form::close()}}




                </div>
            </div>
        </div>
    </div>

    <!-- Script to display selected file name -->
    <script>
        document.getElementById('attachment').addEventListener('change', function (e) {
            const fileName = e.target.files[0]?.name || '{{ __('No file chosen') }}';
            document.getElementById('attachmentFileName').textContent = '{{ __('Selected file:') }} ' + fileName;
        });
    </script>
@endsection
