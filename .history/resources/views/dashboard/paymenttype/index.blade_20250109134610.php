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
                                              <form method="POST" action="{{ route('paymenttype.destroy', $paymenttype->id) }}" class="d-inline" onsubmit="return confirm('{{ __('Are You Sure?') }}\n{{ __('This action cannot be undone. Do you want to continue?') }}');">
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
