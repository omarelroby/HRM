@extends('dashboard.layouts.master')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            @can('Create Employee')
                <a href="#" data-bs-toggle="modal" data-bs-target="#createNationalityModal" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> {{ __('Create New Nationality') }}
                </a>
            @endcan
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="card-title mb-0">{{ __('Nationalities List') }}</h5>
                </div>

                @if (session('success'))
                    <div class="alert alert-success" style="text-align: center;">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger" style="text-align: center;">{{ session('error') }}</div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Name_ar') }}</th>
                                    <th width="200px">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                @foreach ($nationalities as $nationality)
                                    <tr>
                                        <td>{{ $nationality->name }}</td>
                                        <td>{{ $nationality->name_ar }}</td>
                                        <td class="text-right action-btns">
                                            @can('Edit Employee')
                                                <a href="{{ route('nationality.edit', $nationality->id) }}"
                                                   class="btn btn-sm btn-success mr-2"
                                                   data-toggle="tooltip"
                                                   title="{{ __('Edit') }}"
                                                   aria-label="{{ __('Edit') }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan

                                            @can('Delete Employee')
                                                <form method="POST" action="{{ route('nationality.destroy', $nationality->id) }}"
                                                      class="d-inline"
                                                      onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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

    <!-- Create Nationality Modal -->
    <div class="modal fade" id="createNationalityModal" tabindex="-1" aria-labelledby="createNationalityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="createNationalityModalLabel">{{ __('Create Nationality') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    {{ Form::open(['url' => 'nationality', 'method' => 'post']) }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('name', __('Name'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')]) }}
                                    @error('name')
                                        <span class="invalid-name" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('name_ar', __('Name_ar'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' => __('Enter Name in Arabic')]) }}
                                    @error('name_ar')
                                        <span class="invalid-name" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-light border me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    {{ Form::close() }}
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
