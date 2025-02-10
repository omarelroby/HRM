<script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = Utility::getValByName('company_logo');
@endphp

    <!-- Download PDF Button -->
<button class="btn btn-primary" onclick="saveAsPDF()">
    <i class="fa fa-download"></i> {{ __('Download PDF') }}
</button>

<div class="card bg-none card-box">
    <div class="card-body p-4" id="printableArea" dir="rtl">
        <!-- Add inline CSS for PDF styling -->
        <style>
            .pdf-header { border-bottom: 2px solid #333; margin-bottom: 20px; }
            .pdf-table { width: 100%; border-collapse: collapse; margin: 20px 0; direction: rtl; }
            .pdf-table th, .pdf-table td { border: 1px solid #ddd; padding: 8px; text-align: center; }
            .text-right { text-align: right; }
            .total-section { margin-top: 30px; background: #f9f9f9; padding: 15px; text-align: right; }
            .signature-section { margin-top: 50px; }
            .signature-line { font-weight: bold; margin-bottom: 10px; }
        </style>

        <div class="text-center mb-4">
            <img src="{{ $logo . '/' . ($company_logo ?: 'logo.png') }}" class="img-fluid mb-3" style="max-height: 60px; max-width: 200px;">
        </div>

        <div class="row pdf-header pb-4 border-bottom">
            <!-- Basic Information Section -->
            <div class="col-md-4 text-right mb-4 mb-md-0">
                <h5 class="text-primary mb-3">{{ __('Basic Information') }}</h5>
                <div class="info-item">
                    <p class="mb-2"><strong>{{ __('Date') }}:</strong> {{ today()->format('Y-m-d') }}</p>
                    <p class="mb-2"><strong>{{ __('Name') }}:</strong> {{ $service->employee->name }}</p>
                    <p class="mb-2"><strong>{{ __('Employee ID') }}:</strong> {{ $service->employee->id }}</p>
                    <p class="mb-0"><strong>{{ __('Department') }}:</strong> {{ $service->employee->department->name }}</p>
                </div>
            </div>

            <!-- Job and Employment Details Section -->
            <div class="col-md-4 text-right mb-4 mb-md-0">
                <h5 class="text-primary mb-3">{{ __('Job Details') }}</h5>
                <div class="info-item">
                    <p class="mb-2"><strong>{{ __('Job Title') }}:</strong> {{ $service->employee->jobtitle->name ?? 'N/A' }}</p>
                    <p class="mb-2"><strong>{{ __('Nationality') }}:</strong> {{ $service->employee->nationality->name ?? 'N/A' }}</p>
                    <p class="mb-0"><strong>{{ __('Hire Date') }}:</strong> {{ $service->work_start_date ?? 'N/A' }}</p>
                </div>
            </div>
            @php
                $contract=\App\Models\Document::where('employee_id',$service->employee->id)
                ->where('is_contract',1)
                ->first();
            @endphp
            <!-- Service Details Section -->
            <div class="col-md-4 text-right">
                <h5 class="text-primary mb-3">{{ __('Service Details') }}</h5>
                <div class="info-item">
                    <p class="mb-0"><strong>{{ __('Service End Date') }}:</strong> {{ $service->work_end_date ?? 'N/A' }}</p>
                   @if($contract->is_start_end_date==1)
                    <p class="mb-0"><strong>{{ __('Contract Type') }}:</strong> {{ __('limited_time')   }}</p>
                    @else
                        <p class="mb-0"><strong>{{ __('Contract Type') }}:</strong> {{ __('unlimited_time')   }}</p>

                    @endif
                    <p class="mb-0"><strong>{{ __('Contract Duration') }}:</strong>
                        @if ($contract->start_date && $contract->end_date)
                            @php
                                $startDate = new DateTime($contract->start_date);
                                $endDate = new DateTime($contract->end_date);
                                $interval = $startDate->diff($endDate);

                                $duration = '';
                                if ($interval->y > 0) {
                                    $duration .= $interval->y . ' ' . __('Years') . ' ';
                                }
                                if ($interval->m > 0) {
                                    $duration .= $interval->m . ' ' . __('Months') . ' ';
                                }
                                if ($interval->d > 0) {
                                    $duration .= $interval->d . ' ' . __('Days') . ' ';
                                }
                                echo trim($duration); // Remove trailing space
                            @endphp
                        @else
                            {{ 'N/A' }}
                        @endif
                    </p>
                    @if($service->type=='resignation')
                    <p class="mb-0"><strong>{{ __('Service Termination Reason') }}:</strong> {{ __('resignation')  }}</p>
                    @else
                        <p class="mb-0"><strong>{{ __('Service Termination Reason') }}:</strong> {{ __('dismissal')  }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="pdf-table">
                    <thead>
                    <tr>
                        <th>{{ __('Calculation Basis') }}</th>
                        <th>{{ __('Years') }}</th>
                        <th>{{ __('Months') }}</th>
                        <th>{{ __('Days') }}</th>
                        <th class="text-right">{{ __('Amount') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ __('End of Service') }}</td>
                        <td>{{ $service->years }}</td>
                        <td>{{ $service->months }}</td>
                        <td>{{ $service->days }}</td>
                        <td class="text-right">{{ number_format($service->amount, 2) }}</td>
                    </tr>
                    </tbody>
                </table>

                <div class="col-lg-8">
                    <div class="bg-light p-3 rounded">
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">{{ __('Total Amount') }}:</span>
                            <span class="fw-bold text-primary">
                                {{ number_format($service->amount, 2) }} {{ __('SAR') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="signature-section mt-5">
            <div class="row">
                <div class="col-md-6 text-right">
                    <p class="signature-line">{{ __('Employee Signature') }}</p>
                    <p>_________________________</p>
                </div>
                <div class="col-md-6 text-right">
                    <p class="signature-line">{{ __('Manager Signature') }}</p>
                    <p>_________________________</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function saveAsPDF() {
        const element = document.getElementById('printableArea');
        const opt = {
            margin: [0.5, 0.5],
            filename: 'end-of-service-{{ $service->id }}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, useCORS: true, logging: true },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
    }
</script>
