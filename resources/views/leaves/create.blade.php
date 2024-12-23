
    {{Form::open(array('url'=>'leave','method'=>'post'))}}
        <div class="card bg-none mb-4 card-box">
            <div style="padding: 5%" style="padding: 5%" class="row">
            
                <div class="col-6">
                    <div class="form-group">
                        {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                        {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))}}
                    </div>
                </div>
        
                <div class="col-6">
                    <div class="form-group">
                        {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                        {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Name arabic')))}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('start_date',__('Start Date'))}}
                        {{Form::text('start_date',null,array('class'=>'form-control datepicker'))}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('end_date',__('End Date'))}}
                        {{Form::text('end_date',null,array('class'=>'form-control datepicker'))}}
                    </div>
                </div>
            </div>
        </div>


        <div class="card bg-none mb-4 card-box">
            <div style="padding: 5%" class="row">
                <div class="col-12 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="weekend_exception" value="1" id="check-weekend_exception">
                    <label class="custom-control-label" for="check-weekend_exception">{{__('weekend_exception')}} </label>
                </div>

                <div class="col-12 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="holiday_exception" value="1" id="check-holiday_exception">
                    <label class="custom-control-label" for="check-holiday_exception">{{__('holiday_exception')}} </label>
                </div>

                <div class="col-12 mb-2 custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="leave_plan" value="1" id="check-leave_plan">
                    <label class="custom-control-label" for="check-leave_plan">{{__('leave_plan')}} </label>
                </div>

                <div class="col-md-12">
                    <div class="form-group text-center">
                        {{Form::label('leave_plan_percentage',__('leave_plan_percentage'))}}
                        {{Form::text('leave_plan_percentage',null,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>
        </div>

            
        <div class="card bg-none mb-4 card-box">
            <div style="padding: 5%" class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('monthly_waiting_period',__('monthly_waiting_period'))}}
                        {{Form::text('monthly_waiting_period',null,array('class'=>'form-control'))}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('min_allowed_days',__('min_allowed_days'))}}
                        {{Form::text('min_allowed_days',null,array('class'=>'form-control'))}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('max_allowed_days',__('max_allowed_days'))}}
                        {{Form::text('max_allowed_days',null,array('class'=>'form-control'))}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('vacation_balance',__('vacation_balance'))}}
                        {{Form::text('vacation_balance',null,array('class'=>'form-control'))}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 text-center">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
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

