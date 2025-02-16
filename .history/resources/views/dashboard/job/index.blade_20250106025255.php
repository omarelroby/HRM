@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Manage Training') }}
@endsection

@section('content')
<div class="row">
    <!-- Create Button -->
    <div class="d-flex justify-content-end mb-3">
        @can('Create Employee')
            <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> {{ __('Create Job') }}
            </a>
        @endcan
    </div>
    <!-- Trainer List Card -->
      <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-header  text-white">
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
                                @if( Gate::check('Edit Job') ||Gate::check('Delete Job') ||Gate::check('Show Job'))
                                     <th width="3%">{{ __('Action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ !empty($job->branches)?$job->branches->name:__('All') }}</td>
                                    <td>{{$job->title}}</td>
                                    <td>{{\Auth::user()->dateFormat($job->start_date)}}</td>
                                    <td>{{\Auth::user()->dateFormat($job->end_date)}}</td>
                                    <td>
                                        @if($job->status=='active')
                                            <span class="badge badge-success">{{App\Models\Job::$status[$job->status]}}</span>
                                        @else
                                            <span class="badge badge-danger">{{App\Models\Job::$status[$job->status]}}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Auth::user()->dateFormat($job->created_at) }}</td>
                                    @if( Gate::check('Edit Job') ||Gate::check('Delete Job') || Gate::check('Show Job'))
                                        <td>
                                            @if($job->status!='in_active')
                                                <a href="{{ route('job.requirement',[$job->code,!empty($job)?$job->createdBy->lang:'en']) }}" class="edit-icon btn btn-success bg-info copy_link" data-toggle="tooltip" data-original-title="{{__('Click to copy')}}"><i class="fa fa-link"></i></a>
                                            @endif
                                            @can('Show Job')
                                                <a href="{{ route('job.show',$job->id) }}" data-title="{{__('Job Detail')}}" class="edit-icon btn btn-success bg-success" data-toggle="tooltip" data-original-title="{{__('View Detail')}}"><i class="fa fa-eye"></i></a>
                                            @endcan
                                            @can('Edit Job')
                                                <a href="{{ route('job.edit',$job->id) }}" data-title="{{__('Edit Job')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('Delete Job')
                                                <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$job->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job->id],'id'=>'delete-form-'.$job->id]) !!}
                                                {!! Form::close() !!}
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

 <!-- Add Trainer Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Trainer') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{Form::open(array('url'=>'job','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card card-fluid">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('title', __('Job Title'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('title', old('title'), ['class' => 'form-control','required' => 'required']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('branch', __('Branch'),['class'=>'form-control-label']) !!}
                                        {{ Form::select('branch', $branches,null, array('class' => 'form-control select2','required'=>'required')) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('category', __('Job Category'),['class'=>'form-control-label']) !!}
                                        {{ Form::select('category', $categories,null, array('class' => 'form-control select2','required'=>'required')) }}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('position', __('Positions'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('position', old('positions'), ['class' => 'form-control','required' => 'required']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('status', __('Status'),['class'=>'form-control-label']) !!}
                                        {{ Form::select('status', $status,null, array('class' => 'form-control select2','required'=>'required')) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('start_date', __('Start Date'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('start_date', old('start_date'), ['class' => 'form-control datepicker']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('end_date', __('End Date'),['class'=>'form-control-label']) !!}
                                        {!! Form::text('end_date', old('end_date'), ['class' => 'form-control datepicker']) !!}
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" value="" data-toggle="tags" name="skill" placeholder="Skill"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card card-fluid">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6>{{__('Need to ask ?')}}</h6>
                                            <div class="my-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="applicant[]" value="gender" id="check-gender">
                                                    <label class="custom-control-label" for="check-gender">{{__('Gender')}} </label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="applicant[]" value="dob" id="check-dob">
                                                    <label class="custom-control-label" for="check-dob">{{__('Date Of Birth')}}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="applicant[]" value="country" id="check-country">
                                                    <label class="custom-control-label" for="check-country">{{__('Country')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <h6>{{__('Need to show option ?')}}</h6>
                                           <div class="my-4">
                                               <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" name="visibility[]" value="profile" id="check-profile">
                                                   <label class="custom-control-label" for="check-profile">{{__('Profile Image')}} </label>
                                               </div>
                                               <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" name="visibility[]" value="resume" id="check-resume">
                                                   <label class="custom-control-label" for="check-resume">{{__('Resume')}}</label>
                                               </div>
                                               <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" name="visibility[]" value="letter" id="check-letter">
                                                   <label class="custom-control-label" for="check-letter">{{__('Cover Letter')}}</label>
                                               </div>
                                               <div class="custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" name="visibility[]" value="terms" id="check-terms">
                                                   <label class="custom-control-label" for="check-terms">{{__('Terms And Conditions')}}</label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                    <div class="form-group col-md-12">
                                        <h6>{{__('Custom Question')}}</h6>
                                        <div class="my-4">
                                            @foreach($customQuestion as $question)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="custom_question[]" value="{{$question->id}}" id="custom_question_{{$question->id}}">
                                                    <label class="custom-control-label" for="custom_question_{{$question->id}}">{{$question->question}} </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-fluid">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('sescription', __('Job Description'),['class'=>'form-control-label']) !!}
                                        <textarea class="form-control summernote-simple" name="description" id="exampleFormControlTextarea1" rows="15"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-fluid">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('requirement', __('Job Requirement'),['class'=>'form-control-label']) !!}
                                        <textarea class="form-control summernote-simple" name="requirement" id="exampleFormControlTextarea2" rows="8"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <div class="form-group">
                            <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                        </div>
                    </div>
                    {{Form::close()}}
                </div>

                <script>
                    $(function () {
                        $(".gregorian-date , .datepicker").hijriDatePicker({
                        format:'YYYY-M-D',
                        showSwitcher: false,
                        hijri:false,
                        useCurrent: true,
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
