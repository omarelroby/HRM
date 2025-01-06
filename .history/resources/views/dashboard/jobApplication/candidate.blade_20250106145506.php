@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Archive Application')}}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ __('Last Login Details') }}</h5>
                <div>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Refresh">
                        <i class="ti ti-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Last Login') }}</th>
                                <th>{{ __('Role') }}</th>
                            </tr>
                        </thead>
                        <tbody class="font-style">
                            @forelse ($users as $user)
                                <tr>
                                    <td>
                                        @if($user->type == 'employee')
                                            {{ \Auth::user()->employeeIdFormat($user->id) }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if($user->last_login)
                                            {{ \Carbon\Carbon::parse($user->last_login)->format('M d, Y h:i A') }}
                                        @else
                                            <span class="text-muted">{{ __('Never Logged In') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ ucfirst($user->type) }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <h6 class="text-muted">{{ __('No users found.') }}</h6>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover dataTables" >
    <thead>
        <tr>
            <th>{{__('Name')}}</th>
            <th>{{__('Applied For')}}</th>
            <th>{{__('Rating')}}</th>
            <th>{{__('Applied at')}}</th>
            <th>{{__('CV / Resume')}}</th>
            <th>{{__('Action')}}</th>
        </tr>
        </thead>
        <tbody class="font-style">
        @foreach ($archive_application as $application)
            <tr>
                <td><a class="" href="{{ route('job-application.show',\Crypt::encrypt($application->id)) }}">  {{$application->name}}</a></td>
                <td>{{ !empty($application->jobs)?$application->jobs->title:'-' }}</td>
                <td>
                    <span class="static-rating static-rating-sm d-block">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $application->rating)
                                <i class="star fas fa-star voted"></i>
                            @else
                                <i class="star fas fa-star"></i>
                            @endif
                        @endfor
                    </span>
                </td>
                <td>{{\Auth::user()->dateFormat($application->created_at)}}</td>
                <td>
                    @if(!empty($application->resume))
                        <span class="text-sm">
                            <a href="{{asset(Storage::url('uploads/job/resume')).'/'.$application->resume}}" target="_blank"><i class="fas fa-download"></i></a>
                        </span>
                    @else
                        -
                    @endif
                </td>
                <td>
                    @can('Show Job Application')
                        <a class="edit-icon btn btn-success" data-toggle="tooltip" data-title="{{__('Details')}}" href="{{ route('job-application.show',\Crypt::encrypt($application->id)) }}"> <i class="fa fa-eye"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
