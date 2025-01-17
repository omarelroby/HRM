@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Document Type')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Document') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Documents') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Document')}}</th>
                                    <th>{{__('Document (ar)')}}</th>
                                     <th width="3%">{{ __('Action') }}</th>

                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->name }}</td>
                                        <td>{{ $document->name_ar }}</td>
                                        <td>
                                            <h6 class="float-left mr-1">
                                                @if( $document->is_required == 1 )
                                                    <div class="badge rounded-pill badge-success">{{__('Required')}}</div>
                                                @else
                                                    <div class="badge rounded-pill badge-danger">{{__('Not Required')}}</div>
                                                @endif
                                            </h6>
                                        </td>

                                        @if(Gate::check('Edit Document Type') || Gate::check('Delete Document Type'))
                                            <td class="text-right action-btns">
                                                @can('Edit Document Type')
                                                 <!-- Reply Button -->
                                                 <a href="{{ route('document.edit',$document->id) }}"
                                                 class="btn btn-sm btn-success mr-2"
                                                 data-toggle="tooltip"
                                                 title="{{ __('Edit') }}"
                                                 aria-label="{{ __('Edit') }}">
                                                     <i class="fa fa-edit"></i>
                                                 </a>
                                                 @endcan

                                                  @can('Delete Document Type')
                                                  <form method="POST" action="{{ route('document.destroy', $document->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                          <i class="fas fa-trash"></i>
                                                      </button>
                                                  </form>
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
<!-- Add Ticket Modal -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Document') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">

                    {{Form::open(array('url'=>'document','method'=>'post'))}}
                    <div class="row">
                        <div class="form-group col-12">
                            {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                            {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Document Name')))}}
                            @error('name')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            {{Form::label('name_ar',__('Name_ar',['class'=>'form-control-label']))}}
                            {{Form::text('name_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Document Name arabic')))}}
                            @error('name_ar')
                            <span class="invalid-name" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            {{ Form::label('is_required', __('Required Field'),['class'=>'form-control-label']) }}
                            <select class="form-control select2" required name="is_required">
                                <option value="0">{{__('Not Required')}}</option>
                                <option value="1">{{__('Is Required')}}</option>
                            </select>
                        </div>

                        <!-- Checkbox to show additional fields -->
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="showDateFields">
                                <label class="form-check-label" for="showDateFields">
                                    {{ __('Include Date Range') }}
                                </label>
                            </div>
                        </div>

                        <!-- Date Fields (Initially Hidden) -->
                        <div id="dateFields" style="display: none;">
                            <div class="form-group col-6">
                                {{Form::label('start_date',__('Start Date'),['class'=>'form-control-label'])}}
                                {{Form::date('start_date',null,array('class'=>'form-control'))}}
                            </div>
                            <div class="form-group col-6">
                                {{Form::label('end_date',__('End Date'),['class'=>'form-control-label'])}}
                                {{Form::date('end_date',null,array('class'=>'form-control'))}}
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

    <script>
        // JavaScript to toggle visibility of date fields
        document.getElementById('showDateFields').addEventListener('change', function() {
            const dateFields = document.getElementById('dateFields');
            if (this.checked) {
                dateFields.style.display = 'block';
            } else {
                dateFields.style.display = 'none';
            }
        });
    </script>



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
