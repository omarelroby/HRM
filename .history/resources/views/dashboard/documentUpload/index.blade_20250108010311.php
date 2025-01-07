@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Account Asset') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            @can('Create Assets')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary   me-3">
                    <i class="fas fa-plus me-2"></i> {{ __('Create New Document') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <!-- Card Header -->
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h5 class="card-title mb-0">{{ __('Account Assets') }}</h5>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Document')}}</th>
                                    <th>{{__('Role')}}</th>
                                    <th>{{__('Description')}}</th>
                                    @if(Gate::check('Edit Document') || Gate::check('Delete Document'))
                                        <th width="3%">{{__('Action')}}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($documents as $document)
                                    @php
                                        $documentPath=asset(Storage::url('uploads/documentUpload'));
                                        $roles = \Spatie\Permission\Models\Role::find($document->role);
                                    @endphp
                                    <tr>
                                        <td>{{ $document->name }}</td>
                                        <td>
                                            @if(!empty($document->document))
                                                <a href="{{$documentPath.'/'.$document->document}}" target="_blank">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            @else
                                                <p>-</p>
                                            @endif
                                        </td>
                                        <td>{{ !empty($roles)?$roles->name:'All' }}</td>
                                        <td>{{ $document->description }}</td>
                                        @if(Gate::check('Edit Document') || Gate::check('Delete Document'))
                                            <td class="text-right action-btns">
                                                @can('Edit Document')
                                                    <a href="#" data-url="{{ route('document-upload.edit',$document->id)}}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Document')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Document')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$document->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['document-upload.destroy', $document->id],'id'=>'delete-form-'.$document->id]) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Upload Document Modal -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header   text-white">
                    <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('url'=>'document-upload','method'=>'post', 'enctype' => "multipart/form-data"))}}

                    <div class="row">
                        <div class="col-12 mb-3">
                            {{ Form::label('employee_id', __('Ticket for Employee'), ['class' => 'form-label']) }}
                            {{ Form::select('employee_id', $employees, null, ['class' => 'form-select select2', 'placeholder' => __('Select Employee')]) }}
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('name',__('Name'),['class'=>'form-control-label'])}}
                                {{Form::text('name',null,array('class'=>'form-control','required'=>'required'))}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{Form::label('document',__('Document'),['class'=>'form-control-label'])}}
                            <div class="choose-file form-group">
                                <label for="document" class="form-control-label">
                                    <div>{{__('Choose file here')}}</div>
                                    <input type="file" class="form-control" name="document" id="document" data-filename="document_create" required>
                                </label>
                                <p class="document_create"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('role',__('Role'),['class'=>'form-control-label'])}}
                                {{Form::select('role',$roles,null,array('class'=>'form-control select2'))}}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('description', __('Description'),['class'=>'form-control-label'])}}
                                {{ Form::textarea('description',null, array('class' => 'form-control')) }}
                            </div>
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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
