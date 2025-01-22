@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">{{ __('Update Task') }}</h5>
                </div>
                <div class="card-body">
                    {{Form::model($companystructure,array('route' => array('companystructure.update', $companystructure->id), 'method' => 'PUT')) }}
                    <div class="row">

                        @if($companystructure->parent)
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('employee_id',__('Employee'))}}
                                    {{Form::select('employees[]',$employees,$selectedEmployees,array('class'=>'form-control select2','multiple','id'=>'employee_id'))}}
                                </div>
                            </div>
                        @endif

                        <div class="col-12">
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

                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Name arabic')))}}
                                @error('name')
                                <span class="invalid-name" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 my-2">
                            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>

    <!-- Datepicker Script -->
    <script>
        $(function () {
            $(".datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection
