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
                    <h5>{{ __('Update Trainer') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{Form::model($trainer,array('route' => array('trainer.update', $trainer->id), 'method' => 'PUT')) }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('branch',__('Branch'),['class'=>'form-control-label'])}}
                                    {{Form::select('branch',$branches,null,array('class'=>'form-control select2','required'=>'required'))}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('firstname',__('First Name'),['class'=>'form-control-label'])}}
                                    {{Form::text('firstname',null,array('class'=>'form-control','required'=>'required'))}}
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('firstname_ar',__('First Name ar'),['class'=>'form-control-label'])}}
                                    {{Form::text('firstname_ar',null,array('class'=>'form-control','required'=>'required'))}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('lastname',__('Last Name'),['class'=>'form-control-label'])}}
                                    {{Form::text('lastname',null,array('class'=>'form-control','required'=>'required'))}}
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('lastname_ar',__('Last Name_ar'),['class'=>'form-control-label'])}}
                                    {{Form::text('lastname_ar',null,array('class'=>'form-control','required'=>'required'))}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('contact',__('Contact'),['class'=>'form-control-label'])}}
                                    {{Form::text('contact',null,array('class'=>'form-control','required'=>'required'))}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('email',__('Email'),['class'=>'form-control-label'])}}
                                    {{Form::text('email',null,array('class'=>'form-control','required'=>'required'))}}
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                {{Form::label('expertise',__('Expertise'),['class'=>'form-control-label'])}}
                                {{Form::textarea('expertise',null,array('class'=>'form-control','placeholder'=>__('Expertise')))}}
                            </div>
                            <div class="form-group col-lg-6">
                                {{Form::label('address',__('Address'),['class'=>'form-control-label'])}}
                                {{Form::textarea('address',null,array('class'=>'form-control','placeholder'=>__('Address')))}}
                            </div>
                            <div class="col-12 my-2">
                                <input type="submit" value="{{__('Update')}}" class="btn btn-primary">
                                <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                            </div>
                        </div>
                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>

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
@endsection





