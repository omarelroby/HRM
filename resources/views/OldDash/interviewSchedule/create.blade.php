    {{Form::open(array('url'=>'interview-schedule','method'=>'post'))}}
    <div class="row">
        <div class="form-group col-md-6">
            {{Form::label('candidate',__('Interviewer'),['class'=>'form-control-label'])}}
            {{ Form::select('candidate', $candidates,null, array('class' => 'form-control select2','required'=>'required')) }}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('employee',__('Assign Employee'),['class'=>'form-control-label'])}}
            {{ Form::select('employee', $employees,null, array('class' => 'form-control select2','required'=>'required')) }}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('date',__('Interview Date'),['class'=>'form-control-label'])}}
            {{Form::text('date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('time',__('Interview Time'),['class'=>'form-control-label'])}}
            {{Form::text('time',null,array('class'=>'form-control timepicker'))}}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('comment',__('Comment'),['class'=>'form-control-label'])}}
            {{Form::textarea('comment',null,array('class'=>'form-control'))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
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
    
@if($candidate!=0)
    <script>
        $('select#candidate').val({{$candidate}}).trigger('change');
    </script>

 
@endif
