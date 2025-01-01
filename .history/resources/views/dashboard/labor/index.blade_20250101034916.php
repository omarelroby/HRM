@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="all-button-box row d-flex justify-content-end mb-4">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#"
                       class="btn btn-primary btn-icon-only width-auto"
                       data-toggle="modal"
                       data-target="#createNationalityModal">
                        <i class="fa fa-plus"></i> {{ __('Create') }}
                    </a>
                </div>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Labor Companies List') }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Name_ar') }}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($laborcompanies as $laborcompany)
                                    <tr>
                                        <td>{{ $laborcompany->name }}</td>
                                        <td>{{ $laborcompany->name_ar }}</td>
                                        <td class="text-right">
                                            <!-- Edit Button -->
                                            @can('Edit Employee')
                                                <a href="{{ URL::to('labor_companies/'.$laborcompany->id.'/edit') }}"
                                                   class="btn btn-success btn-icon-only"
                                                   data-url="{{ URL::to('labor_companies/'.$laborcompany->id.'/edit') }}"
                                                   data-size="lg"
                                                   data-ajax-popup="true"
                                                   data-title="{{ __('Edit') }}"
                                                   data-toggle="tooltip"
                                                   data-original-title="{{ __('Edit') }}">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            @endcan

                                            <!-- Delete Button -->
                                            @can('Delete Employee')
                                                <a href="#"
                                                   class="btn btn-danger btn-icon-only"
                                                   data-toggle="tooltip"
                                                   data-original-title="{{ __('Delete') }}"
                                                   onclick="if(confirm('{{ __('Are you sure? This action cannot be undone.') }}')) {
                                                                document.getElementById('delete-form-{{ $laborcompany->id }}').submit();
                                                            }">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <!-- Form for Delete -->
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['labor_companies.destroy', $laborcompany->id], 'id' => 'delete-form-' . $laborcompany->id, 'style' => 'display:none;']) !!}
                                                {!! Form::close() !!}
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
@endsection
<!-- Modal for Create Nationality -->
<div class="modal fade" id="createNationalityModal" tabindex="-1" role="dialog" aria-labelledby="createNationalityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNationalityModalLabel">{{ __('Create Labor Company') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['url' => 'labor_companies', 'method' => 'post']) }}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {{ Form::label('name', __('Name'), ['class' => 'form-control-label']) }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')]) }}
                            @error('name')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            {{ Form::label('name_ar', __('Name_ar'), ['class' => 'form-control-label']) }}
                            {{ Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Name in Arabic')]) }}
                            @error('name_ar')
                                <span class="invalid-name" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-between">
                        <input type="submit" value="{{ __('Create') }}" class="btn btn-primary">
                        <input type="button" value="{{ __('Cancel') }}" class="btn btn-white" data-dismiss="modal">
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
