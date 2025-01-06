@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
<div class="row">
    <!-- Create Button -->
    <div class="col-12">
        @can('Create Employee')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary float-end">
                <i class="fas fa-plus"></i> {{ __('Create Job') }}
            </a>
        @endcan
    </div>
    <!-- Trainer List Card -->
    <div class="col-lg-12">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">{{ __('Job List') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>{{__('Branch')}}</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Start Date')}}</th>
                            <th>{{__('End Date')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Created At')}}</th>
                            @if(Gate::check('Edit Job') || Gate::check('Delete Job') || Gate::check('Show Job'))
                                <th>{{ __('Action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td>{{ !empty($job->branches) ? $job->branches->name : __('All') }}</td>
                                <td>{{$job->title}}</td>
                                <td>{{\Auth::user()->dateFormat($job->start_date)}}</td>
                                <td>{{\Auth::user()->dateFormat($job->end_date)}}</td>
                                <td>
                                    @if($job->status == 'active')
                                        <span class="badge bg-success">{{App\Models\Job::$status[$job->status]}}</span>
                                    @else
                                        <span class="badge bg-danger">{{App\Models\Job::$status[$job->status]}}</span>
                                    @endif
                                </td>
                                <td>{{ \Auth::user()->dateFormat($job->created_at) }}</td>
                                @if(Gate::check('Edit Job') || Gate::check('Delete Job') || Gate::check('Show Job'))
                                    <td>
                                        <div class="btn-group">
                                            @if($job->status != 'in_active')
                                                <a href="{{ route('job.requirement', [$job->code, !empty($job) ? $job->createdBy->lang : 'en']) }}" class="btn btn-info copy_link" data-toggle="tooltip" title="{{__('Click to copy')}}"><i class="fa fa-link"></i></a>
                                            @endif
                                            @can('Show Job')
                                                <a href="{{ route('job.show', $job->id) }}" class="btn btn-success" data-toggle="tooltip" title="{{__('View Detail')}}"><i class="fa fa-eye"></i></a>
                                            @endcan
                                            @can('Edit Job')
                                                <a href="{{ route('job.edit', $job->id) }}" class="btn btn-warning" data-toggle="tooltip" title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('Delete Job')
                                                <a href="#" class="btn btn-danger" data-toggle="tooltip" title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$job->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job->id], 'id' => 'delete-form-'.$job->id]) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </div>
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

<!-- Add Trainer Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Job') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ Form::open(['url' => 'job', 'method' => 'post']) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::label('title', __('Job Title'), ['class' => 'form-label']) !!}
                                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('branch', __('Branch'), ['class' => 'form-label']) !!}
                                        {{ Form::select('branch', $branches, null, ['class' => 'form-select select2', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('category', __('Job Category'), ['class' => 'form-label']) !!}
                                        {{ Form::select('category', $categories, null, ['class' => 'form-select select2', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('position', __('Positions'), ['class' => 'form-label']) !!}
                                        {!! Form::text('position', old('positions'), ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('status', __('Status'), ['class' => 'form-label']) !!}
                                        {{ Form::select('status', $status, null, ['class' => 'form-select select2', 'required' => 'required']) }}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('start_date', __('Start Date'), ['class' => 'form-label']) !!}
                                        {!! Form::text('start_date', old('start_date'), ['class' => 'form-control datepicker']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('end_date', __('End Date'), ['class' => 'form-label']) !!}
                                        {!! Form::text('end_date', old('end_date'), ['class' => 'form-control datepicker']) !!}
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="" data-toggle="tags" name="skill" placeholder="Skill"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>{{__('Need to ask ?')}}</h6>
                                        <div class="form-check my-2">
                                            <input type="checkbox" class="form-check-input" name="applicant[]" value="gender" id="check-gender">
                                            <label class="form-check-label" for="check-gender">{{__('Gender')}}</label>
                                        </div>
                                        <div class="form-check my-2">
                                            <input type="checkbox" class="form-check-input" name="applicant[]" value="dob" id="check-dob">
                                            <label class="form-check-label" for="check-dob">{{__('Date Of Birth')}}</label>
                                        </div>
                                        <div class="form-check my-2">
                                            <input type="checkbox" class="form-check-input" name="applicant[]" value="country" id="check-country">
                                            <label class="form-check-label" for="check-country">{{__('Country')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>{{__('Need to show option ?')}}</h6>
                                        <div class="form-check my-2">
                                            <input type="checkbox" class="form-check-input" name="visibility[]" value="profile" id="check-profile">
                                            <label class="form-check-label" for="check-profile">{{__('Profile Image')}}</label>
                                        </div>
                                        <div class="form-check my-2">
                                            <input type="checkbox" class="form-check-input" name="visibility[]" value="resume" id="check-resume">
                                            <label class="form-check-label" for="check-resume">{{__('Resume')}}</label>
                                        </div>
                                        <div class="form-check my-2">
                                            <input type="checkbox" class="form-check-input" name="visibility[]" value="letter" id="check-letter">
                                            <label class="form-check-label" for="check-letter">{{__('Cover Letter')}}</label>
                                        </div>
                                        <div class="form-check my-2">
                                            <input type="checkbox" class="form-check-input" name="visibility[]" value="terms" id="check-terms">
                                            <label class="form-check-label" for="check-terms">{{__('Terms And Conditions')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h6>{{__('Custom Question')}}</h6>
                                        @foreach($customQuestion as $question)
                                            <div class="form-check my-2">
                                                <input type="checkbox" class="form-check-input" name="custom_question[]" value="{{$question->id}}" id="custom_question_{{$question->id}}">
                                                <label class="form-check-label" for="custom_question_{{$question->id}}">{{$question->question}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::label('description', __('Job Description'), ['class' => 'form-label']) !!}
                                        <textarea class="form-control summernote-simple" name="description" rows="15"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::label('requirement', __('Job Requirement'), ['class' => 'form-label']) !!}
                                        <textarea class="form-control summernote-simple" name="requirement" rows="8"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@section('script')
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
