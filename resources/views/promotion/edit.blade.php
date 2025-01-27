    {{Form::model($promotion,array('route' => array('promotion.update', $promotion->id), 'method' => 'PUT')) }}
    <div class="row">
        <div class="form-group col-lg-6 col-md-6">
            {{ Form::label('employee_id', __('Employee'),['class'=>'form-control-label'])}}
            {{ Form::select('employee_id', $employees,null, array('class' => 'form-control select2','required'=>'required')) }}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('designation_id',__('Designation'),['class'=>'form-control-label'])}}
            {{Form::select('designation_id',$designations,null,array('class'=>'form-control select2'))}}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('promotion_title',__('Promotion Title'),['class'=>'form-control-label'])}}
            {{Form::text('promotion_title',null,array('class'=>'form-control'))}}
        </div>
         <div class="form-group col-lg-6 col-md-6">
            {{Form::label('promotion_title_ar',__('Promotion Title_ar'),['class'=>'form-control-label'])}}
            {{Form::text('promotion_title_ar',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-lg-12 col-md-12">
            {{Form::label('promotion_date',__('Promotion Date'),['class'=>'form-control-label'])}}
            {{Form::text('promotion_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-lg-12">
            {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))}}
        </div>
         <div class="form-group col-lg-12">
            {{Form::label('description_ar',__('Description_ar'),['class'=>'form-control-label'])}}
            {{Form::textarea('description_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Description arabic')))}}
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
