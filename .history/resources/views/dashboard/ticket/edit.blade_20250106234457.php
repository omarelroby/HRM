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
                    <h5 class="mb-0">{{ __('Update Custom Question') }}</h5>
                </div>
                <div class="card-body">
                    {{Form::model($ticket,array('route'=>array('ticket.update',$ticket->id),'method' => 'PUT')) }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title',__('Subject'),['class'=>'form-control-label'])}}
                            {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject')))}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title_ar',__('Subject_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject arabic')))}}
                        </div>
                    </div>
                </div>
                @if(\Auth::user()->type!='employee')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('employee_id',__('Ticket for Employee'),['class'=>'form-control-label'])}}
                                {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2'))}}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('priority',__('Priority'),['class'=>'form-control-label'])}}
                            <select name="priority" id="" class="form-control select2">
                                <option value="low" @if($ticket->priority=='low') selected @endif>{{__('Low')}}</option>
                                <option value="medium" @if($ticket->priority=='medium') selected @endif>{{__('Medium')}}</option>
                                <option value="high" @if($ticket->priority=='high') selected @endif>{{__('High')}}</option>
                                <option value="critical" @if($ticket->priority=='critical') selected @endif>{{__('critical')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('end_date',__('End Date'),['class'=>'form-control-label'])}}
                            {{Form::text('end_date',null,array('class'=>'form-control datepicker'))}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
                            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Ticket Description')))}}
                        </div>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('description_ar',__('Description_ar'),['class'=>'form-control-label'])}}
                            {{Form::textarea('description_ar',null,array('class'=>'form-control','placeholder'=>__('Ticket Description arabic')))}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('status',__('Status'),['class'=>'form-control-label'])}}
                            <select name="status" id="" class="form-control select2">
                                <option value="close" @if($ticket->status == 'close') selected @endif>{{__('Close')}}</option>
                                <option value="open" @if($ticket->status == 'open') selected @endif>{{__('Open')}}</option>
                                <option value="onhold" @if($ticket->status == 'onhold') selected @endif>{{__('On Hold')}}</option>
                            </select>
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



