@extends('layouts.admin')

@section('page-title')
    {{__('Manage Custom Question for interview')}}
@endsection

@section('action-button')
    <div class="all-button-box row d-flex justify-content-end">
        @can('Create Custom Question')
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="{{ route('custom-question.create') }}" class="btn btn-primary btn-icon-only width-auto" data-ajax-popup="true" data-title="{{__('Create New Custom Question')}}">
                    <i class="fa fa-plus"></i> {{__('Create')}}
                </a>
            </div>
        @endcan
    </div>
@endsection

@section('content')

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables" >
                                <thead>
                                    <tr>
                                        <th>{{__('Question')}}</th>
                                        <th>{{__('Is Required')}}</th>
                                        <th width="3%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="font-style">
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $question->question }}</td>
                                            <td>
                                                @if($question->is_required=='yes')
                                                    <span class="badge badge-soft-success">{{\App\models\CustomQuestion::$is_required[$question->is_required]}}</span>
                                                @else
                                                    <span class="badge badge-soft-danger">{{\App\models\CustomQuestion::$is_required[$question->is_required]}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @can('Edit Custom Question')
                                                    <a href="#" data-url="{{ route('custom-question.edit',$question->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Custom Question')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('Delete Custom Question')
                                                    <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$question->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['custom-question.destroy', $question->id],'id'=>'delete-form-'.$question->id]) !!}
                                                    {!! Form::close() !!}
                                                @endif
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
@endsection

