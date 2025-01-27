    {{Form::model($complaint,array('route' => array('complaint.update', $complaint->id), 'method' => 'PUT')) }}
    <div class="row">
        @if(\Auth::user()->type !='employee')
            <div class="form-group col-md-6 col-lg-6">
                {{ Form::label('complaint_from', __('Complaint From'),['class'=>'form-control-label'])}}
                {{ Form::select('complaint_from', $employees,null, array('class' => 'form-control  select2','required'=>'required')) }}
            </div>
        @endif
        <div class="form-group col-md-6 col-lg-6">
            {{Form::label('complaint_against',__('Complaint Against'),['class'=>'form-control-label'])}}
            {{Form::select('complaint_against',$employees,null,array('class'=>'form-control select2'))}}
        </div>
        <div class="form-group col-md-6 col-lg-6">
            {{Form::label('title',__('Title'),['class'=>'form-control-label'])}}
            {{Form::text('title',null,array('class'=>'form-control'))}}
        </div>
         <div class="form-group col-md-6 col-lg-6">
            {{Form::label('title_ar',__('Title_ar'),['class'=>'form-control-label'])}}
            {{Form::text('title_ar',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-md-12 col-lg-12">
            {{Form::label('complaint_date',__('Complaint Date'),['class'=>'form-control-label'])}}
            {{Form::text('complaint_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))}}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('description_ar',__('Description_ar'),['class'=>'form-control-label'])}}
            {{Form::textarea('description_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Description arabic')))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
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
