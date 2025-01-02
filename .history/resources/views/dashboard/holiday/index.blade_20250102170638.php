@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <!-- Button to trigger Create Modal -->
        <div class="all-button-box row d-flex justify-content-end mb-4">
            @can('Create Employee')
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="#"
                       data-url="{{ route('nationality.create') }}"
                       class="btn btn-primary btn-icon-only width-auto"
                       data-ajax-popup="true"
                       data-title="{{__('Create New')}}"
                       data-toggle="modal" data-target="#createNationalityModal">
                        <i class="fa fa-plus"></i> {{__('Create')}}
                    </a>
                </div>
            @endcan
        </div>

        <!-- Nationalities List -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Job type list')}}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover dataTables" >
                            <thead>
                                <tr>
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('Occasion')}}</th>
                                    @if(Gate::check('Edit Holiday') || Gate::check('Delete Holiday'))
                                        <th width="3%">{{__('Action')}}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($holidays as $holiday)
                                    <tr>
                                        <td>{{ \Auth::user()->dateFormat($holiday->date) }}</td>
                                        <td>{{ $holiday->occasion }}</td>
                                        @if(Gate::check('Edit Holiday') || Gate::check('Delete Holiday'))
                                        <td class="text-right">
                                            <!-- Edit Button -->
                                            @can('Edit Employee')
                                                <a href="{{ URL::to('holidays/'.$holiday->id.'/edit') }}"
                                                   class="btn btn-success btn-icon-only"
                                                   data-url="{{ URL::to('holidays/'.$holiday->id.'/edit') }}"
                                                   data-size="lg"
                                                   data-ajax-popup="true"
                                                   data-title="{{ __('Edit Job Title') }}"
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
                                                                document.getElementById('delete-form-{{ $holiday->id }}').submit();
                                                            }">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                                <!-- Form for Delete -->
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['holiday.destroy', $holiday->id], 'id' => 'delete-form-' . $holiday->id, 'style' => 'display:none;']) !!}
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

    <!-- Modal for Create Nationality -->
    <div class="modal fade" id="createNationalityModal" tabindex="-1" role="dialog" aria-labelledby="createNationalityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNationalityModalLabel">{{__('create type list')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('url'=>'holiday','method'=>'post'))}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{Form::label('occasion',__('Occasion'),['class'=>'form-control-label'])}}
                            {{Form::text('occasion',null,array('class'=>'form-control'))}}
                        </div>
                         <div class="form-group col-md-6">
                            {{Form::label('occasion_ar',__('Occasion_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('occasion_ar',null,array('class'=>'form-control'))}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('date',__('Date'),['class'=>'form-control-label'])}}
                            {{Form::text('date',null,array('class'=>'form-control datepicker'))}}
                        </div>
                        <div class="col-12">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                            <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                        </div>
                    </div>
                {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
 
@endsection
