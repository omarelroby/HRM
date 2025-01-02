@extends('layouts.admin')
@section('page-title')
    {{__('Manage Payee')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Payee')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('payees.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Payee')}}">
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
                                    <th>{{__('Payee Name')}}</th>
                                    <th>{{__('Contact Number')}}</th>
                                    <th width="3%">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($payees as $payee)
                                    <tr>
                                        <td>{{ $payee->payee_name }}</td>
                                        <td>{{ $payee->contact_number }}</td>

                                        <td class="text-right action-btns">
                                            @can('Edit Payee')
                                                <a href="#" data-url="{{ URL::to('payees/'.$payee->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Payee')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('Delete Payee')
                                                <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$payee->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['payees.destroy', $payee->id],'id'=>'delete-form-'.$payee->id]) !!}
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

