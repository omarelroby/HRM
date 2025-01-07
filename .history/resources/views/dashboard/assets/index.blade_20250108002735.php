@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Assets')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Ticket') }}
                </a>
            @endcan
            <div class="all-button-box row d-flex justify-content-end">

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="all-button-box">
                        <a href="{{ route('assets.export') }}" class="btn btn-primary btn-icon-only width-auto">
                            <i class="fa fa-file-excel"></i> {{ __('Export') }}
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="all-button-box">
                        <a href="#" class="btn btn-primary btn-icon-only width-auto"
                            data-url="{{ route('assets.file.import') }}" data-ajax-popup="true"
                            data-title="{{ __('Import  Asset CSV file') }}">
                            <i class="fa fa-file-csv"></i> {{ __('Import') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Ticket List') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th> {{__('Name')}}</th>
                                    <th> {{__('Purchase Date')}}</th>
                                    <th> {{__('Support Until')}}</th>
                                    <th> {{__('Amount')}}</th>
                                    <th> {{__('Description')}}</th>
                                    @if(Gate::check('Edit Assets') || Gate::check('Delete Assets'))
                                        <th width="3%"> {{__('Action')}}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assets as $asset)
                                    <tr>
                                        <td class="font-style">{{ $asset->name }}</td>
                                        <td class="font-style">{{ \Auth::user()->dateFormat($asset->purchase_date) }}</td>
                                        <td class="font-style">{{ \Auth::user()->dateFormat($asset->supported_date) }}</td>
                                        <td class="font-style">{{ \Auth::user()->priceFormat($asset->amount) }}</td>
                                        <td class="font-style">{{ $asset->description }}</td>
                                        @if(Gate::check('Edit Assets') || Gate::check('Delete Assets'))
                                            <td class="text-right action-btns">
                                                @can('Edit Assets')
                                                    <a href="#" class="edit-icon btn btn-success" data-url="{{ route('account-assets.edit',$asset->id) }}" data-ajax-popup="true" data-title="{{__('Edit Assets')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('Delete Assets')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$asset->id}}').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['account-assets.destroy', $asset->id],'id'=>'delete-form-'.$asset->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>

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
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{ Form::open(array('url' => 'account-assets')) }}
                 <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                {{ Form::label('employee_id', __('Ticket for Employee'), ['class' => 'form-label']) }}
                                {{ Form::select('employee_id', $employees, null, ['class' => 'form-select select2', 'placeholder' => __('Select Employee')]) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('name', __('Name'),['class'=>'form-control-label']) }}
                        {{ Form::text('name', '', array('class' => 'form-control','required'=>'required')) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('amount', __('Amount'),['class'=>'form-control-label']) }}
                        {{ Form::number('amount', '', array('class' => 'form-control','required'=>'required','step'=>'0.01')) }}
                    </div>

                    <div class="form-group  col-md-6">
                        {{ Form::label('purchase_date', __('Purchase Date'),['class'=>'form-control-label']) }}
                        {{ Form::text('purchase_date','', array('class' => 'form-control datepicker')) }}
                    </div>
                    <div class="form-group  col-md-6">
                        {{ Form::label('supported_date', __('Support Until'),['class'=>'form-control-label']) }}
                        {{ Form::text('supported_date','', array('class' => 'form-control datepicker')) }}
                    </div>
                    <div class="form-group  col-md-12">
                        {{ Form::label('description', __('Description'),['class'=>'form-control-label']) }}
                        {{ Form::textarea('description', '', array('class' => 'form-control')) }}
                    </div>
                    <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                    <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
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
                {{ Form::close() }}

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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
