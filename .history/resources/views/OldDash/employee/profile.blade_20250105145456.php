@extends('layouts.admin')
@section('page-title')
    {{__('Employee Profile')}}
@endsection

@section('action-button')

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="ibox-content m-b-sm border-bottom">
                 <div class="row">

                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ Form::label('branch', __('Branch'),['class'=>'text-type']) }}
                                {{ Form::select('branch',$brances,isset($_GET['branch'])?$_GET['branch']:'', array('class' => 'form-control select2')) }}
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ Form::label('department', __('Department'),['class'=>'text-type']) }}
                                {{ Form::select('department',$departments,isset($_GET['department'])?$_GET['department']:'', array('class' => 'form-control select-box select2')) }}
                            </div>
                        </div>

                        <div class="col-sm-3">
                            {{ Form::label('designation', __('Designation'),['class'=>'text-type']) }}
                            <select class="select2 form-control select-box select2-multiple" id="designation_id" name="designation" data-placeholder="{{ __('Select Designation ...') }}">
                                <option value="">{{__('Designation')}}</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <a href="#" class="apply-btn btn btn-primary mt-4" onclick="document.getElementById('employee_profile_filter').submit(); return false;" data-toggle="tooltip" data-title="{{__('Apply')}}">
                                <span class="btn-inner--icon"><i class="fa fa-search"></i></span>
                            </a>
                            <a href="{{route('employee.profile')}}" class="reset-btn btn btn-danger mt-4" data-toggle="tooltip" data-title="{{__('Reset')}}">
                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                            </a>
                        </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection


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
@push('script-page')
    <script>

        $(document).ready(function () {
            var d_id = $('#department').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {
            $.ajax({
                url: '{{route('employee.json')}}',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">{{__('Select Designation')}}</option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
@endpush

