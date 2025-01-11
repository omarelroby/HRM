@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Leave Type')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Leave Type') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Leave Type') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Leave Type')}}</th>
                                    <th>{{__('Leave Type (ar)')}}</th>
                                    <th>{{__('Days / Year')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody class="font-style">
                                    @foreach ($leavetypes as $leavetype)
                                        <tr>
                                            <td>{{ $leavetype->title }}</td>
                                            <td>{{ $leavetype->days}}</td>
                                            <td>{{ $leavetype->days}}</td>


                                            <td class="text-right action-btns">
                                                @can('Edit Leave Type')
                                                 <!-- Reply Button -->
                                                 <a href="{{ route('leavetype.edit',$leavetype->id) }}"
                                                 class="btn btn-sm btn-success mr-2"
                                                 data-toggle="tooltip"
                                                 title="{{ __('Edit') }}"
                                                 aria-label="{{ __('Edit') }}">
                                                     <i class="fa fa-edit"></i>
                                                 </a>
                                                 @endcan

                                                  @can('Delete Leave Type')
                                                  <form method="POST" action="{{ route('leavetype.destroy', $leavetype->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Leave Type') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{Form::open(array('url'=>'leavetype','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title',__('Leave Type'),['class'=>'form-control-label'])}}
                            {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Leave Type Name')))}}
                            @error('title')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title_ar',__('Leave Type_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Leave Type Name arabic')))}}
                            @error('title_ar')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('days',__('Days Per Year'),['class'=>'form-control-label'])}}
                            {{Form::number('days',null,array('class'=>'form-control','placeholder'=>__('Enter Days / Year')))}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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
