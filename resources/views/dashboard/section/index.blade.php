@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection



@section('content')
    <div class="row">

        <div class="d-flex justify-content-end mb-3">
                 <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Section') }}
                </a>

        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Sections') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Sub Department')}}</th>
                                    <th>{{__('Section')}}</th>
                                    <th>{{__('Section (ar)')}}</th>
                                    {{-- <th>{{__('Department Manager')}}</th> --}}
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ !empty($section->sub_dep_id)?$section->sub_dep->name:'' }}</td>
                                        <td>{{ $section->name ??''}}</td>
                                        <td>{{ $section->name_ar ??''}}</td>
                                        {{-- <td>{{ $department->employees ? $department->employees->name : '' }}</td> --}}


                                        <td class="text-right action-btns">

                                                <a href="{{ route('section.edit',$section->id) }}"
                                                   class="btn btn-sm btn-success mr-2"
                                                   data-toggle="tooltip"
                                                   title="{{ __('Edit') }}"
                                                   aria-label="{{ __('Edit') }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('section.destroy', $section->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>


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
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Sub Department') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{Form::open(array('url'=>'section','method'=>'post'))}}
                <div class="row ">
                    <div class="col-12">
                        <div class="form-group">
                            {{Form::label('sub_dep_id',__('Branch'),['class'=>'form-control-label'])}}
                            {{Form::select('sub_dep_id',$sub_deps,null,array('class'=>'form-control select2','placeholder'=>__('Select Sub Department')))}}
                        </div>
                    </div>
{{--
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('employee_id',__('Employee'))}}
                            {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','id'=>'employee_id','placeholder'=>__('Select Employee')))}}
                        </div>
                    </div> --}}

                    <div class="col-12">
                        <div class="form-group">
                            {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Department Name')))}}
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
                            {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Department Name arabic')))}}
                            @error('name_ar')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
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
