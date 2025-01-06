
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
                    <h5 class="mb-0">{{ __('Update Job On Board') }}</h5>
                </div>
                <div class="card-body">

                    {{Form::model($jobOnBoard,array('route' => array('job.on.board.update', $jobOnBoard->id), 'method' => 'post')) }}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {!! Form::label('joining_date', __('Joining Date'),['class'=>'form-control-label']) !!}
                            {!! Form::text('joining_date', null, ['class' => 'form-control datepicker']) !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{Form::label('status',__('Status'),['class'=>'form-control-label'])}}
                            {{Form::select('status',$status,null,array('class'=>'form-control select2'))}}
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

