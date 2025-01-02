@extends('layouts.admin')
@section('page-title')
    {{__('Create Employee')}}
@endsection
@section('content')
    <div class="row">
        {{Form::open(array('route'=>array('employee.store'),'method'=>'post','enctype'=>'multipart/form-data'))}}
        {{--        <form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data">--}}
        {{--        @csrf--}}
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-fluid">
                <div class="card-header">
                    <h6 class="mb-0">{{__('Personal Detail')}}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            {!! Form::label('name', __('Name'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('name', old('name'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <div class="form-group col-md-4">
                            {!! Form::label('name', __('Name_ar'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('name_ar', old('Name_ar'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <div class="form-group col-md-4">
                            {!! Form::label('sync_attendance_employee_id', __('sync_attendance_employee_id'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            <select class="form-control" required="required" name="sync_attendance_employee_id" required>
                                @for($i = 0 ; $i < count($attandance_employees) ; $i++)
                                    <option value="{{ $attandance_employees[$i]['id'] }}">{{ $attandance_employees[$i]['name'] }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            {!! Form::label('phone', __('Phone'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('phone',old('phone'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('dob', old('dob'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('gender', __('Gender'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="Male" name="gender" checked class="custom-control-input">
                                        <label class="custom-control-label" for="g_male">{{__('Male')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_female" value="Female" name="gender" class="custom-control-input">
                                        <label class="custom-control-label" for="g_female">{{__('Female')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('jobtitle_id', __('jobtitle'),['class'=>'form-control-label']) }}
                            {{ Form::select('jobtitle_id', $jobtitles,null, array('class' => 'form-control  select2','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('category_id', __('category'),['class'=>'form-control-label']) }}
                            {{ Form::select('category_id', $categories,null, array('class' => 'form-control  select2','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('nationality_type', __('nationality_type'),['class'=>'form-control-label']) }}
                            {{ Form::select('nationality_type', [ "0" => __('non_saudi') , "1" => __('saudi') ],null, array('class' => 'form-control','id' => 'nationality_type','required'=>'required')) }}
                        </div>

                        <div  class="form-group col-md-6">
                            <div id="nationality">
                                {{ Form::label('nationality_id', __('nationality'),['class'=>'form-control-label']) }}
                                {{ Form::select('nationality_id', $nationalities,null, array('class' => 'form-control  select2')) }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('work_time', __('work_time'),['class'=>'form-control-label']) }}
                            {{ Form::select('work_time', [ "1" => __('full_time') , "0" => __('part_time') ],null, array('class' => 'form-control','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('city', __('city'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('city', old('city'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('passport_number', __('passport_number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('passport_number', old('passport_number'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('residence_number', __('residence_number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('residence_number', old('residence_number'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('social_status', __('social_status'),['class'=>'form-control-label']) }}
                            {{ Form::select('social_status', [ "1" => __('married') , "0" => __('single') ],null, array('class' => 'form-control','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group">
                                {!! Form::label('commencement_date', __('commencement_date'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                {!! Form::text('commencement_date', old('commencement_date'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('contract_number', __('contract_number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('contract_number', old('contract_number'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('insurance_number', __('insurance_number'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::text('insurance_number', old('insurance_number'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('is_active', __('status'),['class'=>'form-control-label']) }}
                            {{ Form::select('is_active', [ "1" => __('active') , "0" => __('not_active') ],null, array('class' => 'form-control','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('driving_license', __('driving_license'),['class'=>'form-control-label']) }}
                            {{ Form::select('driving_license', [ "1" => __('yes') , "0" => __('no') ],null, array('class' => 'form-control',"id" => "driving_license",'required'=>'required')) }}
                        </div>

                        <div class="form-group driving_license_info col-md-6">
                            {!! Form::label('driving_license_number', __('driving_license_number'),['class'=>'form-control-label']) !!}
                            {!! Form::text('driving_license_number', old('driving_license_number'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group driving_license_info col-md-6">
                            <div class="form-group">
                                {!! Form::label('expiry_date', __('expiry_date'),['class'=>'form-control-label']) !!}
                                {!! Form::text('expiry_date', old('expiry_date'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('email', __('Email'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::email('email',old('email'), ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('password', __('Password'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                            {!! Form::password('password', ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                    </div>
                    <div class="form-group">
                        {!! Form::label('address', __('Address'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                        {!! Form::textarea('address',old('address'), ['class' => 'form-control','rows'=>2]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Company Detail')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    <div class="row">
                        @csrf
                        <div class="form-group col-md-12">
                            {!! Form::label('employee_id', __('Employee ID'),['class'=>'form-control-label']) !!}
                            {!! Form::text('employee_id', $employeesId, ['class' => 'form-control','disabled'=>'disabled']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('branch_id', __('Branch'),['class'=>'form-control-label']) }}
                            {{ Form::select('branch_id', $branches,null, array('class' => 'form-control  select2','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('department_id', __('Department'),['class'=>'form-control-label']) }}
                            {{ Form::select('department_id', $departments,null, array('class' => 'form-control  select2','id'=>'department_id','required'=>'required')) }}
                        </div>

                        <div class="form-group col-md-12">
                            {{ Form::label('designation_id', __('Designation'),['class'=>'form-control-label']) }}
                            <select class="select2 form-control select2-multiple" id="designation_id" name="designation_id" data-toggle="select2" data-placeholder="{{ __('Select Designation ...') }}">
                                <option value="">{{__('Select any Designation')}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 ">
                            {!! Form::label('company_doj', __('Company Date Of Joining'),['class'=>'form-control-label']) !!}
                            {!! Form::text('company_doj', null, ['class' => 'form-control datepicker','required' => 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Contract_Detail')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    <div class="row">
                        @csrf

                        <div class="form-group col-md-6">
                            {{ Form::label('contract_type', __('contract_type'),['class'=>'form-control-label']) }}
                            {{ Form::select('contract_type', [ "1" => __('limited_time') , "0" => __('unlimited_time'), "2" => __('temporary') ],null, array('class' => 'form-control',"id" => "contract_type",'required'=>'required')) }}
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="choose-file">
                                    <label for="avatar">
                                        <div>{{__('contract_document')}}</div>
                                        <input type="file" class="form-control" id="contract_document" name="contract_document" data-filename="contract_document">
                                    </label>
                                    <p class="contract_document"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div id="contract_startdate" class="form-group">
                                {!! Form::label('contract_startdate', __('contract_startdate'),['class'=>'form-control-label']) !!}
                                {!! Form::text('contract_startdate', old('contract_startdate'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div id="contract_enddate" class="form-group">
                                {!! Form::label('contract_enddate', __('contract_enddate'),['class'=>'form-control-label']) !!}
                                {!! Form::text('contract_enddate', old('contract_enddate'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            {{ Form::label('medical_insurance', __('medical_insurance'),['class'=>'form-control-label']) }}
                            {{ Form::select('medical_insurance', [ "1" => __('available') , "0" => __('not_available') ],null, array('class' => 'form-control',"id" => "medical_insurance",'required'=>'required')) }}
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="choose-file">
                                    <label for="avatar">
                                        <div>{{__('insurance_document')}}</div>
                                        <input type="file" class="form-control" id="insurance_document" name="insurance_document" data-filename="insurance_document">
                                    </label>
                                    <p class="insurance_document"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div id="insurance_startdate" class="form-group">
                                {!! Form::label('insurance_startdate', __('insurance_startdate'),['class'=>'form-control-label']) !!}
                                {!! Form::text('insurance_startdate', old('insurance_startdate'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div id="insurance_enddate" class="form-group">
                                {!! Form::label('insurance_enddate', __('insurance_enddate'),['class'=>'form-control-label']) !!}
                                {!! Form::text('insurance_enddate', old('insurance_enddate'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::label('worker', __('worker'),['class'=>'form-control-label']) }}
                            {{ Form::select('worker', [ "1" => __('available') , "0" => __('not_available') ],null, array('class' => 'form-control',"id" => "worker",'required'=>'required')) }}
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="choose-file">
                                    <label for="avatar">
                                        <div>{{__('worker_document')}}</div>
                                        <input type="file" class="form-control" id="worker_document" name="worker_document" data-filename="worker_document">
                                    </label>
                                    <p class="worker_document"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div id="worker_startdate" class="form-group">
                                {!! Form::label('worker_startdate', __('worker_startdate'),['class'=>'form-control-label']) !!}
                                {!! Form::text('worker_startdate', old('worker_startdate'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div id="worker_enddate" class="form-group">
                                {!! Form::label('worker_enddate', __('worker_enddate'),['class'=>'form-control-label']) !!}
                                {!! Form::text('worker_enddate', old('worker_enddate'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            {!! Form::label('residence_number', __('residence_number'),['class'=>'form-control-label']) !!}
                            {!! Form::text('residence_number', old('residence_number'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            <div id="passport_expiredate" class="form-group">
                                {!! Form::label('residence_expiredate', __('residence_expiredate'),['class'=>'form-control-label']) !!}
                                {!! Form::text('residence_expiredate', old('residence_expiredate'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            {!! Form::label('passport_number', __('passport_number'),['class'=>'form-control-label']) !!}
                            {!! Form::text('passport_number', old('passport_number'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            <div id="passport_expiredate" class="form-group">
                                {!! Form::label('passport_expiredate', __('passport_expiredate'),['class'=>'form-control-label']) !!}
                                {!! Form::text('passport_expiredate', old('passport_expiredate'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Bank Account Detail')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            {!! Form::label('account_holder_name', __('Account Holder Name'),['class'=>'form-control-label']) !!}
                            {!! Form::text('account_holder_name', old('account_holder_name'), ['class' => 'form-control']) !!}

                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('account_number', __('Account Number'),['class'=>'form-control-label']) !!}
                            {!! Form::number('account_number', old('account_number'), ['class' => 'form-control']) !!}

                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('bank_name', __('Bank Name'),['class'=>'form-control-label']) !!}
                            {!! Form::text('bank_name', old('bank_name'), ['class' => 'form-control']) !!}

                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('bank_identifier_code', __('Bank Identifier Code'),['class'=>'form-control-label']) !!}
                            {!! Form::text('bank_identifier_code',old('bank_identifier_code'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('branch_location', __('Branch Location'),['class'=>'form-control-label']) !!}
                            {!! Form::text('branch_location',old('branch_location'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('tax_payer_id', __('Tax Payer Id'),['class'=>'form-control-label']) !!}
                            {!! Form::text('tax_payer_id',old('tax_payer_id'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0">{{__('Document')}}</h6></div>
                <div class="card-body employee-detail-create-body">
                    @foreach($documents as $key=>$document)
                        <div class="row">
                            <div class="form-group col-12">
                                <div class="float-left col-4">
                                    <label for="document" class="float-left pt-1 form-control-label">{{ $document->name }} @if($document->is_required == 1) <span class="text-danger">*</span> @endif</label>
                                </div>
                                <div class="float-right col-8">
                                    <input type="hidden" name="emp_doc_id[{{ $document->id}}]" id="" value="{{$document->id}}">
                                    <div class="choose-file form-group">
                                        <label for="document[{{ $document->id }}]">
                                            <div>{{__('Choose File')}}</div>
                                            <input class="form-control  @error('document') is-invalid @enderror border-0" @if($document->is_required == 1) required @endif name="document[{{ $document->id}}]" type="file" id="document[{{ $document->id }}]" data-filename="{{ $document->id.'_filename'}}">
                                        </label>
                                        <p class="{{ $document->id.'_filename'}}"></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-12">
        {!! Form::submit('Create', ['class' => 'btn btn-xs badge-blue float-right radius-10px']) !!}
        {{--  </form>--}}
            {{Form::close()}}
        </div>
    </div>
@endsection

@push('script-page')
    <script>

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        $(document).on('change', '#nationality_type', function () {
            var nationality_type = $(this).val();
            if(nationality_type == 1)
            {
                $('#nationality').css('display','none');
            }else{
                $('#nationality').css('display','block');
            } 
        });

        $(document).on('change', '#driving_license', function () {
            var driving_license = $(this).val();
            if(driving_license == 0)
            {
                $('.driving_license_info').css('display','none');
            }else{
                $('.driving_license_info').css('display','block');
            }
        });

        $(document).on('change', '#contract_type', function () {
            var contract_type = $(this).val();
            if(contract_type == 0)
            {
                $('#contract_enddate').css('display','none');
            }else{
                $('#contract_enddate').css('display','block');
            } 
        });

        $(document).on('change', '#medical_insurance', function () {
            var medical_insurance = $(this).val();
            if(medical_insurance == 0)
            {
                $('#insurance_startdate').css('display','none');
                $('#insurance_enddate').css('display','none');
            }else{
                $('#insurance_startdate').css('display','block');
                $('#insurance_enddate').css('display','block');
            } 
        });

        $(document).on('change', '#worker', function () {
            var worker = $(this).val();
            if(worker == 0)
            {
                $('#worker_startdate').css('display','none');
                $('#worker_enddate').css('display','none');
            }else{
                $('#worker_startdate').css('display','block');
                $('#worker_enddate').css('display','block');
            } 
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
                    $('#designation_id').append('<option value="">{{__('Select any Designation')}}</option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
    </script>
@endpush
