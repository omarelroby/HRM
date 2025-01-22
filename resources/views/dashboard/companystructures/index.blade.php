@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="all-button-box row d-flex justify-content-end">
            <div class="all-button-box row d-flex justify-content-end my-2">
                @can('Create Branch')
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 my-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg"
                           data-title="{{__('Create New Structure')}}">
                            <i class="fa fa-plus"></i> {{__('Create')}}
                        </a>
                    </div>
                @endcan

                @can('Create Branch')
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 my-2">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#resetModal" class="btn btn-danger btn-lg">
                            <i class="fa fa-refresh"></i> {{__('Reset')}}
                        </a>
                    </div>
                @endcan
            </div>

            <!-- Reset Confirmation Modal -->
            <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resetModalLabel">{{ __('Confirm Reset') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                        </div>
                        <div class="modal-body">
                            {{ __('Are you sure you want to reset all company structures? This action cannot be undone.') }}
                        </div>

                        @can('Create Branch')
                            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 my-2">
                                <form method="POST" action="{{ route('companystructure.reset') }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg">
                                        <i class="fa fa-refresh"></i> {{ __('Reset') }}
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{ __('Company Structure') }}</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                 <th width="200px">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach($CompanyStructures as $CompanyStructure)
                                <tr>
                                    <td>{{ $CompanyStructure['name'.$lang] }}</td>



{{--                                        --}}
                                        <td class="text-right action-btns">
                                        @can('Edit Branch')
                                                <a href="{{asset('companytree/'.$CompanyStructure->id)}}" class="btn btn-secondary btn-sm" data-url="{{ URL::to('companytree/'.$CompanyStructure->id) }}" data-size="lg" data-ajax-popup="true" data-toggle="tooltip" title="{{__('Tree')}}">
                                                <i class="fa fa-tree"></i>
                                                </a>
                                                <!-- Reply Button -->
                                                <a href="{{ route('companystructure.edit',$CompanyStructure->id) }}"
                                                   class="btn btn-sm btn-success mr-2"
                                                   data-toggle="tooltip"
                                                   title="{{ __('Edit') }}"
                                                   aria-label="{{ __('Edit') }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                       @endcan
                                       @can('Delete Branch')
                                            <form method="POST" action="{{ route('companystructure.destroy', $CompanyStructure->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
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

                    {{Form::open(array('url'=>'companystructure','method'=>'post'))}}
                    <div class="row">
                           <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('employee_id',__('Select The Root'))}}
                                    {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2', 'id'=>'employee_id'))}}
                                </div>
                            </div>


                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name')))}}
                                @error('name')
                                <span class="invalid-name" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                                {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Name arabic')))}}
                                @error('name_ar')
                                <span class="invalid-name" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 my-2">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>

@endsection
