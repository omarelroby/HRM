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

        <div class="row pdf-header pb-4">
<<<<<<< Updated upstream
            <div class="col-md-3 text-right">
                <h5>{{ __('Basic Information') }}</h5>
                <p class="mb-1"><strong>{{ __('التاريخ') }}:</strong> {{today()->format('Y-m-d')}}  </p>
                <p class="mb-1"><strong>{{ __('الاسم') }}:</strong> {{ $service->employee->name }}</p>
                <p class="mb-1"><strong>{{ __('رقم الموظف') }}:</strong> {{ $service->employee->id }}</p>
                <p class="mb-0"><strong>{{ __('القسم') }}:</strong> {{ $service->employee->department->name }}</p>
            </div>
            <div class="col-md-6 text-right">
                <h5></h5>
                 <p class="mb-1"><strong>{{ __('المسمى الوظيفي') }}:</strong> {{ $service->employee->jobtitle->name ??'' }}</p>
                <p class="mb-1"><strong>{{ __('الجنسية') }}:</strong> {{ $service->employee->nationality->name ??'' }}</p>
                <p class="mb-0"><strong>{{ __('القسم') }}:</strong> {{ $service->employee->department->name }}</p>
=======
            <div class="col-md-6 text-right">
                <h5>{{ __('البيانات العامة') }}</h5>
                <p class="mb-1"><strong>{{ __('التاريخ') }}:</strong> ......./......./....... {{ __('الموافق') }}</p>
                <p class="mb-1"><strong>{{ __('الاسم') }}:</strong> {{ $service->employee->name }}</p>
                <p class="mb-1"><strong>{{ __('رقم الموظف') }}:</strong> {{ $service->employee->employee_number }}</p>
                <p class="mb-0"><strong>{{ __('القسم') }}:</strong> {{ $service->employee->department }}</p>
            </div>

            <div class="col-md-6 text-right">
                <h5>{{ __('تفاصيل الشركة') }}</h5>
                <p class="mb-1">{{ \Utility::getValByName('company_name') }}</p>
                <p class="mb-1">{{ \Utility::getValByName('company_address') }}</p>
                <p class="mb-0">{{ \Utility::getValByName('company_city') }}, {{ \Utility::getValByName('company_zipcode') }}</p>
>>>>>>> Stashed changes
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="pdf-table">
                    <thead>
                    <tr>
                        <th>{{ __('نوع العقد') }}</th>
                        <th>{{ __('تاريخ التعيين') }}</th>
                        <th>{{ __('تاريخ انتهاء الخدمة') }}</th>
                        <th>{{ __('سبب انتهاء الخدمة') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $service->contract_type }}</td>
                        <td>{{ \Auth::user()->dateFormat($service->hire_date) }}</td>
                        <td>{{ \Auth::user()->dateFormat($service->work_end_date) }}</td>
                        <td>{{ $service->termination_reason }}</td>
                    </tr>
                    </tbody>
                </table>

                <div class="total-section">
                    <div class="d-flex justify-content-between">
                        <strong>{{ __('إجمالي مدة الخدمة') }}:</strong>
                        <span>{{ $service->total_service_years }} {{ __('سنة') }}, {{ $service->total_service_months }} {{ __('شهر') }}, {{ $service->total_service_days }} {{ __('يوم') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <strong>{{ __('المبلغ الإجمالي') }}:</strong>
                        <span>{{ number_format($service->amount, 2) }} {{ __('ريال سعودي') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="signature-section mt-5">
            <div class="row">
                <div class="col-md-6 text-right">
                    <p class="signature-line">{{ __('توقيع الموظف') }}</p>
                    <p>_________________________</p>
                </div>
                <div class="col-md-6 text-right">
                    <p class="signature-line">{{ __('توقيع المسؤول') }}</p>
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
