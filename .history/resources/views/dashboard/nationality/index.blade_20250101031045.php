@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="all-button-box row d-flex justify-content-end">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#" data-url="{{ route('nationality.create') }}"
                       class="btn btn-primary btn-icon-only width-auto"
                       data-ajax-popup="true"
                       data-title="{{__('Create New')}}">
                        <i class="fa fa-plus"></i> {{__('Create')}}
                    </a>
                </div>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Nationalities List')}}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Name_ar')}}</th>
                                    <th width="200px">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($nationalities as $nationality)
                                    <tr>
                                        <td>{{ $nationality->name }}</td>
                                        <td>{{ $nationality->name_ar }}</td>
                                        <td class="text-right">
                                            <div class="btn-group" role="group">
                                                @can('Edit Employee')
                                                    <a href="{{ URL::to('nationality/'.$nationality->id.'/edit') }}"
                                                       class="btn btn-success btn-icon-only"
                                                       data-url="{{ URL::to('nationality/'.$nationality->id.'/edit') }}"
                                                       data-size="lg"
                                                       data-ajax-popup="true"
                                                       data-title="{{__('Edit')}}"
                                                       data-toggle="tooltip"
                                                       data-original-title="{{__('Edit')}}">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                @endcan

                                                @can('Delete Employee')
                                                    <a href="#"
                                                       class="btn btn-danger btn-icon-only"
                                                       data-toggle="tooltip"
                                                       data-original-title="{{__('Delete')}}"
                                                       onclick="if(confirm('{{ __('Are you sure? This action cannot be undone.') }}')) {
                                                                   document.getElementById('delete-form-{{$nationality->id}}').submit();
                                                               }">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>

                                                    <!-- Delete Form -->
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['nationality.destroy', $nationality->id], 'id' => 'delete-form-' . $nationality->id, 'style' => 'display:none;']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </div>
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

