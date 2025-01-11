@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Allowance Option')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New allowance option') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('allowance option') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">

                            <thead>
                                <tr>
                                    <th>{{__('Allowance Option')}}</th>
                                    <th>{{__('Allowance Option (ar)')}}</th>
                                    <th>{{__('added_to_insurance')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach($allowanceoptions as $allowanceoption)
                                    <tr>
                                        <td>{{ $allowanceoption->name }}</td>
                                        <td>{{ $allowanceoption->name_ar }}</td>
                                        <td>{{ $allowanceoption->name_ar }}</td>


                                                <td class="text-right action-btns">
                                                    @can('Edit Allowance Option')
                                                     <!-- Reply Button -->
                                                     <a href="{{ route('allowanceoption.edit',$allowanceoption->id) }}"
                                                     class="btn btn-sm btn-success mr-2"
                                                     data-toggle="tooltip"
                                                     title="{{ __('Edit') }}"
                                                     aria-label="{{ __('Edit') }}">
                                                         <i class="fa fa-edit"></i>
                                                     </a>
                                                     @endcan

                                                      @can('Delete Allowance Option')
                                                      <form method="POST" action="{{ route('allowanceoption.destroy', $allowanceoption->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add allowance option') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{Form::open(array('url'=>'allowanceoption','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Allowance option Name')))}}
                            @error('name')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('name_ar',__('Name_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Allowance option Name arabic')))}}
                            @error('name_ar')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::label('insurance_active', __('added_to_insurance'),['class'=>'form-control-label']) }}
                        {{ Form::select('insurance_active', [ "0" => __('no') , "1" => __('yes') ],null, array('class' => 'form-control','required'=>'required')) }}
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::label('payroll_dispaly', __('added_to_payroll'),['class'=>'form-control-label']) }}
                        {{ Form::select('payroll_dispaly', [ null => __('no') , "1" => __('yes') ],null, array('class' => 'form-control','required'=>'required')) }}
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



<!-- Datepicker Script -->
<script>
    $(function () {
        $(".datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true,
        });
    });
</script>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
