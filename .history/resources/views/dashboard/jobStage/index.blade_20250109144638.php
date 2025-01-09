@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Job Stage')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Job Stage') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Job Job Stage') }}</h5>
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
        </div>
    </div>
<!-- Add Ticket Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add job stage') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{Form::open(array('url'=>'job-stage','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title',__('Title'),['class'=>'form-control-label'])}}
                            {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter stage title')))}}
                        </div>
                    </div>
                     <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title_ar',__('Title_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter stage title arabic')))}}
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
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    @if(\Auth::user()->type=='company')
        <script>
            $(function () {
                $(".sortable").sortable();
                $(".sortable").disableSelection();
                $(".sortable").sortable({
                    stop: function () {
                        var order = [];
                        $(this).find('li').each(function (index, data) {
                            order[index] = $(data).attr('data-id');
                        });

                        $.ajax({
                            url: "{{route('job.stage.order')}}",
                            data: {order: order, _token: $('meta[name="csrf-token"]').attr('content')},
                            type: 'POST',
                            success: function (data) {
                            },
                            error: function (data) {
                                data = data.responseJSON;
                                toastr('Error', data.error, 'error')
                            }
                        })
                    }
                });
            });
        </script>
    @endif
@endpush
