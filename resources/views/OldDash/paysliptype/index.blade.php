@extends('layouts.admin')

@section('page-title')
    {{__('Manage Payslip Type')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Payslip Type')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('paysliptype.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create Payslip Type')}}">
                <i class="fa fa-plus"></i> {{__('Create')}}
            </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5></h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                            <tr>
                                <th>{{__('Payslip Type')}}</th>
                                 <th width="200px">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($paysliptypes as $paysliptype)
                                <tr>
                                    <td>{{ $paysliptype->name }}</td>

                                    <td>
                                        @can('Edit Payslip Type')
                                            <a href="#" data-url="{{ URL::to('paysliptype/'.$paysliptype->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Payslip Type')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('Delete Payslip Type')
                                            <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$paysliptype->id}}').submit();"><i class="fa fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['paysliptype.destroy', $paysliptype->id],'id'=>'delete-form-'.$paysliptype->id]) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

