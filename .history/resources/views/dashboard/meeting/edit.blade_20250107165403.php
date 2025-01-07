@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header   text-white">
                    <h5 class="mb-0">{{ __('Update Meeting') }}</h5>
                </div>
                <div class="card-body">
                    {{Form::model($interviewSchedule,array('route' => array('interview-schedule.update', $interviewSchedule->id), 'method' => 'PUT')) }}
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
                            {{Form::label('time',__('Interview Time'),['class'=>'form-control-label'])}}
                            {{Form::text('time',null,array('class'=>'form-control timepicker'))}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('date',__('Interview Date'),['class'=>'form-control-label'])}}
                            {{Form::text('date',null,array('class'=>'form-control datepicker'))}}
                        </div>

                        <div class="form-group col-md-12">
                            {{Form::label('comment',__('Comment'),['class'=>'form-control-label'])}}
                            {{Form::textarea('comment',null,array('class'=>'form-control'))}}
                        </div>
                        <div class="col-12 my-4">
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
