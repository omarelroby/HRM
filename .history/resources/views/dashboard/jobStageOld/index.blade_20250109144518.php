@extends('layouts.admin')
@push('script-page')

@endpush
@section('page-title')
    {{__('Manage Job Stage')}}
@endsection
@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('job-stage.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Job Stage')}}">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">

            </div>
        </div>
        <div class="card-body">
            <div class="tab-content tab-bordered">
                <div class="tab-pane fade show active" role="tabpanel">
                    <ul class="list-group sortable">
                        @foreach ($stages as $stage)
                            <li class="list-group-item" data-id="{{$stage->id}}">
                                {{$stage->title}}
                                @can('Edit Job Stage')
                                    <span class="float-right">
                                        <a href="#" data-url="{{ route('job-stage.edit',$stage->id) }}" data-ajax-popup="true" data-title="{{__('Edit Job Stage')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                         @endcan
                                        @can('Delete Job Stage')
                                            <a href="#!" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$stage->id}}').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['job-stage.destroy', $stage->id],'id'=>'delete-form-'.$stage->id]) !!}
                                            {!! Form::close() !!}
                                        </span>
                                @endcan
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <p class="text-muted mt-4"><strong>{{__('Note')}} : </strong>{{__('You can easily order change of job stage using drag & drop.')}}</p>
        </div>
    </div>
@endsection

