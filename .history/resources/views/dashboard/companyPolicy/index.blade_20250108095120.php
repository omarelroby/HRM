@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Ticket') }}
@endsection



@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Ticket')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Policy') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Company Pl') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Branch')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Description')}}</th>
                                    <th>{{__('Attachment')}}</th>
                                    @if(Gate::check('Edit Company Policy') || Gate::check('Delete Company Policy'))
                                        <th width="3%">{{__('Action')}}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($companyPolicy as $policy)
                                    @php
                                        $policyPath=asset(Storage::url('uploads/companyPolicy'));
                                    @endphp
                                    <tr>
                                        <td>{{ !empty($policy->branches)?$policy->branches->name:'' }}</td>
                                        <td>{{ $policy->title }}</td>
                                        <td>{{ $policy->description }}</td>
                                        <td>
                                            @if(!empty($policy->attachment))
                                                <a href="{{$policyPath.'/'.$policy->attachment}}" target="_blank">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            @else
                                                <p>-</p>
                                            @endif
                                        </td>
                                        @if(Gate::check('Edit Company Policy') || Gate::check('Delete Company Policy'))
                                            <td class="text-right action-btns">
                                                @can('Edit Company Policy')
                                                    <a href="#" data-url="{{ route('company-policy.edit',$policy->id)}}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Company Policy')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Company Policy')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$policy->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['company-policy.destroy', $policy->id],'id'=>'delete-form-'.$policy->id]) !!}
                                                    {!! Form::close() !!}
                                                @endif
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
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Custom Question') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{Form::open(array('url'=>'company-policy','method'=>'post', 'enctype' => "multipart/form-data"))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('branch',__('Branch'),['class'=>'form-control-label'])}}
                            {{Form::select('branch',$branch,null,array('class'=>'form-control select2','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('title',__('Title'),['class'=>'form-control-label'])}}
                            {{Form::text('title',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('title_ar',__('Title_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('title_ar',null,array('class'=>'form-control','required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', __('Description'),['class'=>'form-control-label'])}}
                            {{ Form::textarea('description',null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description_ar', __('Description_ar'),['class'=>'form-control-label'])}}
                            {{ Form::textarea('description_ar',null, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        {{Form::label('attachment',__('Attachment'),['class'=>'form-control-label'])}}
                        <div class="choose-file form-group">
                            <label for="attachment" class="form-control-label">
                                <div>{{__('Choose file here')}}</div>
                                <input type="file" class="form-control" name="attachment" id="attachment" data-filename="attachment_create">
                            </label>
                            <p class="attachment_create"></p>
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
