@extends('layouts.admin')

@section('page-title')
    {{__('labor_companies')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Employee')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('labor_companies.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New')}}">
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
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Name_ar')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($laborcompanies as $laborcompany)
                                    <tr>
                                        <td>{{ $laborcompany->name }}</td>
                                        <td>{{ $laborcompany->name_ar }}</td>
                                        <td class="Action text-right">
                                            <span>
                                                @can('Edit Employee')
                                                    <a href="#" class="edit-icon btn btn-success" data-url="{{ URL::to('labor_companies/'.$laborcompany->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Employee')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$laborcompany->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['labor_companies.destroy', $laborcompany->id],'id'=>'delete-form-'.$laborcompany->id]) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </span>
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

