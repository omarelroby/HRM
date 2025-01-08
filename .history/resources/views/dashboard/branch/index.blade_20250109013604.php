@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Ticket')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Branch') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Branches') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Add Ticket Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Branch') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{Form::open(array('url'=>'ticket','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title',__('Subject'),['class'=>'form-control-label'])}}
                            {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject')))}}
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title_ar',__('Subject_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject arabic')))}}
                        </div>
                        </div>
                    </div>
                </div>
                @if(\Auth::user()->type!='employee')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('employee_id',__('Ticket for Employee'),['class'=>'form-control-label'])}}
                                {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','placeholder'=>__('Select Employee')))}}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('priority',__('Priority'),['class'=>'form-control-label'])}}
                            <select name="priority" id="" class="form-control select2">
                                <option value="low">{{__('Low')}}</option>
                                <option value="medium">{{__('Medium')}}</option>
                                <option value="high">{{__('High')}}</option>
                                <option value="critical">{{__('critical')}}</option>
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
                     <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('description_ar',__('Description_ar'),['class'=>'form-control-label'])}}
                            {{Form::textarea('description_ar',null,array('class'=>'form-control','placeholder'=>__('Ticket Description arabic')))}}
                        </div>
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

<!-- Script to display selected file name -->
<script>
    document.getElementById('attachment').addEventListener('change', function (e) {
        const fileName = e.target.files[0]?.name || '{{ __('No file chosen') }}';
        document.getElementById('attachmentFileName').textContent = fileName;
    });
</script>

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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
