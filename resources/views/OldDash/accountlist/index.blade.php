@extends('layouts.admin')

@section('page-title')
    {{__('Manage Account')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Account List')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="{{ route('accountlist.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Account')}}">
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
                                        <th>{{__('Account Name')}}</th>
                                        <th>{{__('Initial Balance')}}</th>
                                        <th>{{__('Account Number')}}</th>
                                        <th>{{__('Branch Code')}}</th>
                                        <th>{{__('Bank Branch')}}</th>
                                        <th width="3%">{{__('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody class="font-style">
                                    @foreach ($accountlists as $accountlist)
                                        <tr>
                                            <td>{{ $accountlist->account_name }}</td>
                                            <td>{{  \Auth::user()->priceFormat($accountlist->initial_balance) }}</td>
                                            <td>{{ $accountlist->account_number }}</td>
                                            <td>{{ $accountlist->branch_code }}</td>
                                            <td>{{ $accountlist->bank_branch }}</td>
                                            <td class="text-right action-btns">
                                                @can('Edit Account List')
                                                    <a href="#" data-url="{{ URL::to('accountlist/'.$accountlist->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Account List')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Account List')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$accountlist->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['accountlist.destroy', $accountlist->id],'id'=>'delete-form-'.$accountlist->id]) !!}
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

