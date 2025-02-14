@extends('dashboard.layouts.master')


@section('content')
    <div class="row">


        <!-- Email Templates Table -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header   text-white">
                    <h5 class="card-title mb-0">{{ __('Email Templates List') }}</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Email Subject') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emails as $index => $email)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $email->subject }}</td>
                                    <td class="text-right action-btns">
                                        <!-- View Button -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#viewEmailModal_{{$email->id}}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i> {{ __('View') }}
                                        </a>
                                        <!-- Edit Button -->
                                        <a href="{{ route('email-template.edit', $email->id) }}"
                                           class="btn btn-sm btn-success mx-2" data-toggle="tooltip" title="{{ __('Edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form method="POST" action="{{ route('email-template.destroy', $email->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="{{ __('Delete') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- View Email Modal -->
                                <div class="modal fade" id="viewEmailModal_{{$email->id}}" tabindex="-1" aria-labelledby="viewEmailModalLabel{{$email->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header text-white">
                                                <h5 class="modal-title" id="viewEmailModalLabel{{$email->id}}">{{ __('Email Template Details') }}</h5>
{{--                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                            </div>

                                            <!-- Modal Body -->
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Subject') }}:</label>
                                                    <p>{{ $email->subject }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Message') }}:</label>
                                                    <div class="border p-3">

                                                        {!! $email->message !!}
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Message AR') }}:</label>
                                                    <div class="border p-3">
                                                         {!! $email->message_ar !!}

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
@endpush
