@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Account Asset') }}
@endsection

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-4">
            @can('Create Assets')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary   me-3">
                    <i class="fas fa-plus me-2"></i> {{ __('Create New Account Asset') }}
                </a>
            @endcan
            <div class="d-flex">
                <div class="me-3">
                    <a href="{{ route('assets.export') }}" class="btn btn-success btn-icon-only">
                        <i class="fa fa-file-excel me-2"></i> {{ __('Export') }}
                    </a>
                </div>
                <div>
                    <a href="#" class="btn btn-info btn-icon-only" data-url="{{ route('assets.file.import') }}" data-ajax-popup="true" data-title="{{ __('Import Asset CSV file') }}">
                        <i class="fa fa-file-csv me-2"></i> {{ __('Import') }}
                    </a>
                </div>
            </div>
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

    <!-- Add Ticket Modal -->
    <div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header   text-white">
                    <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
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
