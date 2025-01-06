@extends('dashboard.layouts.master')
@section('page-title')
    {{__('Manage Job OnBoard')}}
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
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Job')}}</th>
                                    <th>{{__('Branch')}}</th>
                                    <th>{{__('Applied at')}}</th>
                                    <th>{{__('Joining at')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th width="3%">{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($jobOnBoards as $job)
                                    <tr>
                                        <td>{{ !empty($job->applications)?$job->applications->name:'-' }}</td>
                                        <td>{{!empty($job->applications)?!empty($job->applications->jobs)?$job->applications->jobs->title:'-':'-'}}</td>
                                        <td>{{!empty($job->applications)?!empty($job->applications->jobs)?!empty($job->applications->jobs)?!empty($job->applications->jobs->branches)?$job->applications->jobs->branches->name:'-':'-':'-':'-'}}</td>
                                        <td>{{\Auth::user()->dateFormat(!empty($job->applications)?$job->applications->created_at:'-' )}}</td>
                                        <td>{{\Auth::user()->dateFormat($job->joining_date)}}</td>
                                        <td>
                                            @if($job->status=='pending')
                                                <span class="badge badge-soft-warning">{{\App\Models\JobOnBoard::$status[$job->status]}}</span>
                                            @elseif($job->status=='cancel')
                                                <span class="badge badge-soft-danger">{{\App\models\JobOnBoard::$status[$job->status]}}</span>
                                            @else
                                                <span class="badge badge-soft-success">{{\App\models\JobOnBoard::$status[$job->status]}}</span>
                                            @endif
                                        </td>

                                        <td class="text-right action-btns">
                                            @if($job->status=='confirm' && $job->convert_to_employee==0)
                                                <a href="{{route('job.on.board.convert', $job->id)}}" class="edit-icon btn btn-success bg-info" data-toggle="tooltip" data-original-title="{{__('Convert to Employee')}}"><i class="fas fa-exchange-alt"></i></a>
                                            @elseif($job->status=='confirm' && $job->convert_to_employee!=0)
                                                <a href="{{route('employee.show', \Crypt::encrypt($job->convert_to_employee))}}" class="edit-icon btn btn-success bg-info" data-toggle="tooltip" data-original-title="{{__('Employee Detail')}}"><i class="fas fa-eye"></i></a>
                                            @endif

                                            <a href="#" data-url="{{route('job.on.board.edit', $job->id)}}" data-ajax-popup="true" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fas fa-edit"></i></a>

                                            <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$job->id}}').submit();"><i class="fas fa-trash"></i></a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['job.on.board.delete', $job->id],'id'=>'delete-form-'.$job->id]) !!}
                                            {!! Form::close() !!}

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

