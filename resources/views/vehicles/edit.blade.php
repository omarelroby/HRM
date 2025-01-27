    {{Form::model($Vehicle,array('route' => array('vehicle.update', $Vehicle->id), 'method' => 'PUT')) }}
    <div class="row">
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('vehicle_type',__('vehicle_type'),['class'=>'form-control-label'])}}
            {{Form::text('vehicle_type',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('vehicle_type_ar',__('vehicle_type_ar'),['class'=>'form-control-label'])}}
            {{Form::text('vehicle_type_ar',null,array('class'=>'form-control'))}}
        </div>

        <div class="form-group col-md-6">
            {{Form::label('model',__('model'),['class'=>'form-control-label'])}}
            {{Form::text('model',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('model_ar',__('model_ar'),['class'=>'form-control-label'])}}
            {{Form::text('model_ar',null,array('class'=>'form-control'))}}
        </div>

        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('registration_date',__('registration_date'),['class'=>'form-control-label'])}}
            {{Form::text('registration_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('insurance_date',__('insurance_date'),['class'=>'form-control-label'])}}
            {{Form::text('insurance_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        

        <div class="form-group col-md-6">
            {{Form::label('custody',__('custody'),['class'=>'form-control-label'])}}
            {{Form::text('custody',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('custody_ar',__('custody_ar'),['class'=>'form-control-label'])}}
            {{Form::text('custody_ar',null,array('class'=>'form-control'))}}
        </div>


        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('check_date',__('check_date'),['class'=>'form-control-label'])}}
            {{Form::text('check_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('insurance_expiry_date',__('insurance_expiry_date'),['class'=>'form-control-label'])}}
            {{Form::text('insurance_expiry_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('check_expiry_date',__('check_expiry_date'),['class'=>'form-control-label'])}}
            {{Form::text('check_expiry_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}

    <script>
        $(function () {
            $(".gregorian-date , .datepicker").hijriDatePicker({
            format:'YYYY-M-D',
            showSwitcher: false,
            hijri:false,
            useCurrent: true,
            });
        });
    </script>
