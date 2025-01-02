@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job Titles') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Update Job Type') }}</h5>
                </div>
                <div class="card-body">
                    {{Form::open(array('url'=>'holiday','method'=>'post'))}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{Form::label('date',__('Date'),['class'=>'form-control-label'])}}
                            {{Form::text('date',null,array('class'=>'form-control datepicker'))}}
                        </div>
                        <div class="form-group col-md-12">
                            {{Form::label('occasion',__('Occasion'),['class'=>'form-control-label'])}}
                            {{Form::text('occasion',null,array('class'=>'form-control'))}}
                        </div>
                         <div class="form-group col-md-12">
                            {{Form::label('occasion_ar',__('Occasion_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('occasion_ar',null,array('class'=>'form-control'))}}
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

                </div>
            </div>
        </div>
    </div>
@endsection
 
