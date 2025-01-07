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
                    {{Form::model($meeting,array('route' => array('meeting.update', $meeting->id), 'method' => 'PUT')) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('title',__('Meeting Title'),['class'=>'form-control-label'])}}
                                {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Meeting Title')))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('date',__('Meeting Date'),['class'=>'form-control-label'])}}
                                {{Form::text('date',null,array('class'=>'form-control datepicker'))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('time',__('Meeting Time'),['class'=>'form-control-label'])}}
                                {{Form::text('time',null,array('class'=>'form-control timepicker'))}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('note',__('Meeting Note'),['class'=>'form-control-label'])}}
                                {{Form::textarea('note',null,array('class'=>'form-control','placeholder'=>__('Enter Meeting Note')))}}
                            </div>
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
