@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Department')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create competencies') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('competencies') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Type')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($competencies as $competency)
                                    <tr>
                                        <td>{{ $competency->name }}</td>
                                        <td>{{ $competency->getPerformance_type->name }}</td>
                                        <td class="text-right action-btns">
                                            @can('Edit Department')
                                             <!-- Reply Button -->
                                             <a href="{{ route('competencies.edit',$competency->id) }}"
                                             class="btn btn-sm btn-success mr-2"
                                             data-toggle="tooltip"
                                             title="{{ __('Edit') }}"
                                             aria-label="{{ __('Edit') }}">
                                                 <i class="fa fa-edit"></i>
                                             </a>
                                             @endcan

                                              @can('Delete Department')
                                              <form method="POST" action="{{ route('competencies.destroy', $competency->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add competencies') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                {{Form::open(array('url'=>'competencies','method'=>'post'))}}
                <div class="row ">
                    <div class="col-12">
                        <div class="form-group">
                            {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                            {{Form::text('name',null,array('class'=>'form-control'))}}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            {{Form::label('type',__('Type'),['class'=>'form-control-label'])}}
                            {{Form::select('type',$performance_types,null,array('class'=>'form-control select2'))}}
                        </div>
                    </div>
                    <div class="col-12 text-end my-2">
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        <button type="button" class="btn btn-close-white" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    </div>

                </div>
                {{Form::close()}}


            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
