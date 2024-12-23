
    {{Form::model($EmployeeFollower,array('route' => array('followers.update', $EmployeeFollower->id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data' )) }}
    <div class="card-body p-0">
        <div class="row">

            <div class="form-group col-md-6">
                {{ Form::label('name', __('Name'),['class'=>'form-control-label']) }}
                {{ Form::text('name',null, array('class' => 'form-control ','required'=>'required')) }}
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('name_ar', __('Name_ar'),['class'=>'form-control-label']) }}
                {{ Form::text('name_ar',null, array('class' => 'form-control ','required'=>'required')) }}
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('nationality_type', __('nationality_type'),['class'=>'form-control-label']) }}
                {{ Form::select('nationality_type', [ "0" => __('non_saudi') , "1" => __('saudi') ],null, array('class' => 'form-control wizard-required' ,'id' => 'nationality_type')) }}
            </div>

            <div class="form-group col-md-6">
                <div id="nationalityyy" >
                    {{ Form::label('nationality_id', __('nationality'),['class'=>'form-control-label']) }}
                    {{ Form::select('nationality_id', $nationalities,null, array('class' => 'form-control wizard-required' )) }}
                </div>
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('gender', __('Gender'),['class'=>'form-control-label']) }}
                {{ Form::select('gender', [ "Male" => __('Male') , "Female" => __('Female') ],null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group col-md-4">
                {!! Form::label('relationship', __('relationship'),['class'=>'form-control-label']) !!}
                {!! Form::text('relationship', old('relationship'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('social_status', __('social_status'),['class'=>'form-control-label']) }}
                {{ Form::select('social_status', [ "1" => __('married') , "0" => __('single') , "2" => __('divorced') ],null, array('class' => 'form-control')) }}
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']) !!}
                    {!! Form::text('dob', old('dob') ?? now(), ['class' => 'form-control gregorian-date']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('residence_number', __('residence_number'),['class'=>'form-control-label']) }}
                {{ Form::number('residence_number',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01')) }}
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('passport_number', __('passport_number'),['class'=>'form-control-label']) }}
                {{ Form::number('passport_number',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01')) }}
            </div>

            <div class="form-group col-md-6">
                <div class="form-group">
                    {!! Form::label('passport_expiry_date', __('passport_issuance_date_gregorian'),['class'=>'form-control-label']) !!}
                    {!! Form::text('passport_expiry_date', old('passport_expiry_date') ?? now(), ['class' => 'form-control gregorian-date']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('medical_insurance_number', __('medical_insurance_number'),['class'=>'form-control-label']) }}
                {{ Form::number('medical_insurance_number',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01')) }}
            </div>

            <div class="form-group col-md-6">
                <div class="form-group">
                    {!! Form::label('medical_insurance_expiry_date', __('Medical_Insurance_Expiry_Date_Gregorian'),['class'=>'form-control-label']) !!}
                    {!! Form::text('medical_insurance_expiry_date', old('medical_insurance_expiry_date') ?? now(), ['class' => 'form-control gregorian-date']) !!}
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <div class="choose-file">
                        <label for="avatar">
                            <div>{{__('follower_documents')}}</div>
                            <input type="file" class="form-control" id="follower_documents" name="follower_documents" multiple data-filename="follower_documents">
                        </label>
                        <p class="follower_documents"></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}

    <script>
        $(document).on('change', '#nationality_type', function () {
            var nationality_type = $(this).val();
            if(nationality_type == 1)
            {
                $('#nationalityyy').hide();
            }else{
                $('#nationalityyy').show();
            }
        });

        $(function () {
            $(".gregorian-date").hijriDatePicker({
              format:'YYYY-M-D',
              showSwitcher: false,
              hijri:false,
              useCurrent: true,
            });
        });

    </script>
