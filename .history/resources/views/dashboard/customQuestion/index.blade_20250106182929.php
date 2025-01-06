@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
<div class="row">

    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
        @can('Create Custom Question')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> {{ __('Create Custom Question') }}
            </a>
        @endcan
    </div>
    <!-- Job List Card -->
    <div class="col-lg-12">
        <div class="row">

        </div>
        <div class="card shadow-sm">

            <div class="card-header text-white">
                <h5 class="card-title mb-0">{{ __('Job List') }}</h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
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
                                        @can('')
                                            <a href="#" data-url="{{ route('custom-question.edit',$question->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Custom Question')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('Delete Custom Question')
                                            <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$question->id}}').submit();"><i class="fa fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['custom-question.destroy', $question->id],'id'=>'delete-form-'.$question->id]) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                    <td>
                                        @can('Edit Job')
                                        <a href="{{ route('job.on.board.edit', $job->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="{{ __('Edit') }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('Delete Job')
                                        <form method="POST" action="{{ route('job.on.board.delete', $job->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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

<!-- Add Job Modal -->
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
                {{Form::open(array('url'=>'custom-question','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('question',__('Question'),['class'=>'form-control-label'])}}
                            {{Form::text('question',null,array('class'=>'form-control','placeholder'=>__('Enter question')))}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('is_required',__('Is Required'),['class'=>'form-control-label'])}}
                            {{ Form::select('is_required', $is_required,null, array('class' => 'form-control select2','required'=>'required')) }}
                        </div>
                    </div>
                    <div class="col-12 my-2">
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

@section('script')
<script>

    $(function () {
        $(".gregorian-date, .datepicker").hijriDatePicker({
            format: 'YYYY-M-D',
            showSwitcher: false,
            hijri: false,
            useCurrent: true,
        });
    });
</script>
@endsection
