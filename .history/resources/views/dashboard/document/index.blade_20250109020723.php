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
                                    <th>{{__('Required Field')}}</th>
                                    @if(Gate::check('Edit Document Type') || Gate::check('Delete Document Type'))
                                        <th width="3%">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->name }}</td>
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
                                                    <a href="#" data-url="{{ URL::to('document/'.$document->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Document Type')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Document Type')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$document->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['document.destroy', $document->id],'id'=>'delete-form-'.$document->id]) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </td>
                                            <td class="text-right action-btns">
                                                @can('Edit Document Type')
                                                 <!-- Reply Button -->
                                                 <a href="{{ route('company-policy.edit',$policy->id) }}"
                                                 class="btn btn-sm btn-success mr-2"
                                                 data-toggle="tooltip"
                                                 title="{{ __('Edit') }}"
                                                 aria-label="{{ __('Edit') }}">
                                                     <i class="fa fa-edit"></i>
                                                 </a>
                                                 @endcan

                                                  @can('Delete Document Type')
                                                  <form method="POST" action="{{ route('company-policy.destroy', $policy->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
