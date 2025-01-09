@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Payment Type')
                <a href="#" data-bs-toggle="modal" data-bs-target="#addTrainingModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create Payment Type') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Payment Type') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{__('Payment Type')}}</th>
                                    <th width="200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="fdont-style">
                                @foreach ($paymenttypes as $paymenttype)
                                    <tr>
                                        <td>{{ $paymenttype->name }}</td>

                                        <td>
                                            @can('Edit Payment Type')
                                                <a href="#" data-url="{{ URL::to('paymenttype/'.$paymenttype->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Payment Type')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('Delete Payment Type')
                                                <a href="#" class="delete-icon btn btn-danger" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$paymenttype->id}}').submit();"><i class="fa fa-trash"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['paymenttype.destroy', $paymenttype->id],'id'=>'delete-form-'.$paymenttype->id]) !!}
                                                {!! Form::close() !!}
                                            @endif
                                        </td>
                                        <td class="text-right action-btns">
                                            @can('Edit Payment Type')
                                             <!-- Reply Button -->
                                             <a href="{{ route('paymenttype.edit',$paymenttype->id) }}"
                                             class="btn btn-sm btn-success mr-2"
                                             data-toggle="tooltip"
                                             title="{{ __('Edit') }}"
                                             aria-label="{{ __('Edit') }}">
                                                 <i class="fa fa-edit"></i>
                                             </a>
                                             @endcan

                                              @can('Delete Payment Type')
                                              <form method="POST" action="{{ route('company-policy.destroy', $policy->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
<!-- Add Ticket Modal -->
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-white">
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Payment Type') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                {{Form::open(array('url'=>'ticket','method'=>'post'))}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title',__('Subject'),['class'=>'form-control-label'])}}
                            {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject')))}}
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('title_ar',__('Subject_ar'),['class'=>'form-control-label'])}}
                            {{Form::text('title_ar',null,array('class'=>'form-control','placeholder'=>__('Enter Ticket Subject arabic')))}}
                        </div>
                        </div>
                    </div>
                </div>
                @if(\Auth::user()->type!='employee')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('employee_id',__('Ticket for Employee'),['class'=>'form-control-label'])}}
                                {{Form::select('employee_id',$employees,null,array('class'=>'form-control select2','placeholder'=>__('Select Employee')))}}
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('priority',__('Priority'),['class'=>'form-control-label'])}}
                            <select name="priority" id="" class="form-control select2">
                                <option value="low">{{__('Low')}}</option>
                                <option value="medium">{{__('Medium')}}</option>
                                <option value="high">{{__('High')}}</option>
                                <option value="critical">{{__('critical')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('end_date',__('End Date'),['class'=>'form-control-label'])}}
                            {{Form::text('end_date',null,array('class'=>'form-control datepicker'))}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
                            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Ticket Description')))}}
                        </div>
                    </div>
                     <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('description_ar',__('Description_ar'),['class'=>'form-control-label'])}}
                            {{Form::textarea('description_ar',null,array('class'=>'form-control','placeholder'=>__('Ticket Description arabic')))}}
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
                        <input type="button" value="{{__('Cancel')}}" class="btn btn-white" data-dismiss="modal">
                    </div>
                </div>
                {{Form::close()}}

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
