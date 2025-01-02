@extends('layouts.admin')

@section('page-title')
    {{__('Company Structures')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Branch')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('companystructure.create') }}?id={{$segment}}" 
                class="btn btn-primary btn-icon-only width-auto" 
                data-ajax-popup="true" 
                @if($segment)
                data-title="{{__('Create New position')}}"
                @else
                data-title="{{__('Create New Structure')}}"
                @endif
                >
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
                                    <th>{{__('employee')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach($CompanyStructures as $CompanyStructure)
                                    <tr>
                                        <td>{{ $CompanyStructure['name'.$lang] }}</td>
                                        <td>
                                            @if($CompanyStructure->employees)
                                                @foreach($CompanyStructure->employees as $emp)
                                                    <a href="{{ route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($emp->id)) }}"><span>{{$emp['name'.$lang]}}</span></a> - 
                                                @endforeach
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="Action text-right">
                                            <span>
                                                @can('Edit Branch')
                                                    <a href="{{asset('companytree/'.$CompanyStructure->id)}}" class="edit-icon btn btn-secondary" data-url="{{ URL::to('companytree/'.$CompanyStructure->id) }}" data-size="lg" data-ajax-popup="true" data-title="" data-toggle="tooltip" data-original-title="{{__('Tree')}}"><i class="fa fa-tree"></i></a>
                                                    <a href="#" class="edit-icon btn btn-success" data-url="{{ URL::to('companystructure/'.$CompanyStructure->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Structure')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{asset('companystructure/'.$CompanyStructure->id)}}" class="edit-icon btn btn-info" data-url="{{ URL::to('companystructure/'.$CompanyStructure->id) }}" data-size="lg" data-ajax-popup="true" data-title="" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-eye"></i></a>
                                                @endcan
                                                @can('Delete Branch')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$CompanyStructure->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['companystructure.destroy', $CompanyStructure->id],'id'=>'delete-form-'.$CompanyStructure->id]) !!}
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

