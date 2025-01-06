@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header  text-white">
                    <h5 class="mb-0">{{ __('Update Job') }}</h5>
                </div>
                <div class="card-body">
                    <div class="card bg-none card-box">
                        {{Form::model($customQuestion,array('route' => array('custom-question.update', $customQuestion->id), 'method' => 'PUT')) }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('question',__('Question'),['class'=>'form-control-label'])}}
                                    {{Form::text('question',null,array('class'=>'form-control','placeholder'=>__('Enter question')))}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('is_required',__('Is Required'),['class'=>'form-control-label'])}}
                                    {{ Form::select('is_required', $is_required,null, array('class' => 'form-control select2','required'=>'required')) }}
                                </div>
                            </div>
                            <div class="col-12">
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
            $(".gregorian-date, .datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection
