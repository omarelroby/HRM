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
                    <h5 class="card-title mb-0">{{ __('Company Policies') }}</h5>
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

                                                    <a href="#" data-url="{{ route('company-policy.edit',$policy->id)}}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Company Policy')}}" class="edit-icon btn btn-success" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fa fa-edit"></i></a>


                                            </td>
                                            @can('Edit Company Policy')
                                              <!-- Reply Button -->
                                              <a href="{{ URL::to('company-policy/' . $policy->id) }}"
                                                class="btn btn-sm btn-success mr-2"
                                                data-toggle="tooltip"
                                                title="{{ __('Reply') }}"
                                                aria-label="{{ __('Reply') }}">
                                                 <i class="fa fa-reply"></i>
                                             </a>
                                             @endcan

                                         @can('Delete Company Policy')
                                         <form method="POST" action="{{ route('company-policy.destroy', $policy->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                 <i class="fas fa-trash"></i>
                                             </button>
                                         </form>
                                         @endcan
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
                <h5 class="modal-title" id="addTrainingModalLabel">{{ __('Add Company Policy') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                {{ Form::open(['url' => 'company-policy', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                <div class="row g-3">
                    <!-- Branch Selection -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('branch', __('Branch'), ['class' => 'form-label']) }}
                            {{ Form::select('branch', $branch, null, ['class' => 'form-control select2', 'required' => 'required', 'aria-describedby' => 'branchHelp']) }}
                            <small id="branchHelp" class="form-text text-muted">{{ __('Select the branch for this question.') }}</small>
                        </div>
                    </div>

                    <!-- Title (English) -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title', __('Title (English)'), ['class' => 'form-label']) }}
                            {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter title in English')]) }}
                        </div>
                    </div>

                    <!-- Title (Arabic) -->
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('title_ar', __('Title (Arabic)'), ['class' => 'form-label']) }}
                            {{ Form::text('title_ar', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter title in Arabic')]) }}
                        </div>
                    </div>

                    <!-- Description (English) -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', __('Description (English)'), ['class' => 'form-label']) }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter description in English')]) }}
                        </div>
                    </div>

                    <!-- Description (Arabic) -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description_ar', __('Description (Arabic)'), ['class' => 'form-label']) }}
                            {{ Form::textarea('description_ar', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter description in Arabic')]) }}
                        </div>
                    </div>

                    <!-- Attachment -->
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('attachment', __('Attachment'), ['class' => 'form-label']) }}
                            <div class="input-group">
                                <input type="file" class="form-control" name="attachment" id="attachment" aria-describedby="attachmentHelp">
                                <label for="attachment" class="input-group-text">{{ __('Choose file') }}</label>
                            </div>
                            <small id="attachmentHelp" class="form-text text-muted">{{ __('Upload a file if necessary.') }}</small>
                            <p class="mt-2" id="attachmentFileName"></p>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

<!-- Script to display selected file name -->
<script>
    document.getElementById('attachment').addEventListener('change', function (e) {
        const fileName = e.target.files[0]?.name || '{{ __('No file chosen') }}';
        document.getElementById('attachmentFileName').textContent = fileName;
    });
</script>

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
