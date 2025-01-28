@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
@endphp
<div class="card bg-none card-box">
    <div class="text-md-right mb-2">
        <a href="#" class="btn btn-xs rounded-pill btn-warning" onclick="saveAsPDF()"><span class="fa fa-download"></span></a>
        <a title="Mail Send" href="{{route('payslip.send',[$employee->id,$payslip->salary_month])}}" class="btn btn-xs rounded-pill btn-primary"><span class="fa fa-paper-plane"></span></a>
    </div>
    <div class="card-body p-4" id="printableArea">
        <div class="text-center mb-4">
            <img src="{{$logo.'/'.($company_logo ?: 'logo.png')}}"
                 class="img-fluid mb-3"
                 alt="Company Logo"
                 style="max-height: 60px">
        </div>

        <!-- Header Section -->
        <div class="row border-bottom pb-4 mb-4">
            <div class="col-md-6">
                <div class="d-flex flex-column">
                    <h6 class="fw-bold text-dark mb-2">{{ __('Employee Details') }}</h6>
                    <div class="text-muted">
                        <p class="mb-1"><strong>{{ __('Name') }}:</strong> {{ $employee->name }}</p>
                        <p class="mb-1"><strong>{{ __('Position') }}:</strong> {{ __('Employee') }}</p>
                        <p class="mb-0"><strong>{{ __('Salary Date') }}:</strong>
                            {{ \Auth::user()->dateFormat($payslip->created_at) }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
                <div class="d-flex flex-column text-md-end">
                    <h6 class="fw-bold text-dark mb-2">{{ __('Company Details') }}</h6>
                    <div class="text-muted">
                        <p class="mb-1">{{ \Utility::getValByName('company_name') }}</p>
                        <p class="mb-1">
                            {{ \Utility::getValByName('company_address') }},
                            {{ \Utility::getValByName('company_city') }}
                        </p>
                        <p class="mb-0">
                            {{ \Utility::getValByName('company_state') }} -
                            {{ \Utility::getValByName('company_zipcode') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-2">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tbody>
                            <tr class="font-weight-bold">
                                <th>{{__('Earning')}}</th>
                                <th>{{__('Title')}}</th>
                                <th class="text-right">{{__('Amount')}}</th>
                            </tr>
                            <tr>
                                <td>{{__('Basic Salary')}}</td>
                                <td>-</td>
                                <td class="text-right">{{  \Auth::user()->priceFormat( $payslip->basic_salary)}}</td>
                            </tr>
                            @foreach($payslipDetail['earning']['allowance'] as $allowance)
                                <tr>
                                    <td>{{__('Allowance')}}</td>
                                    <td>{{$allowance->title}}</td>
                                    <td class="text-right">{{  \Auth::user()->priceFormat( $allowance->amount)}}</td>
                                </tr>
                            @endforeach
                            @foreach($payslipDetail['earning']['commission'] as $commission)
                                <?php
//                                 $commission->amount = $commission->type == '$' ? $commission->amount :  $totalSalary * ($commission->amount) / 100 ;
                                ?>
                                <tr>
                                    <td>{{__('Commission')}}</td>
                                    <td>{{$commission->title}}</td>
                                    <td class="text-right">

                                        {{  \Auth::user()->priceFormat( $commission->amount)}}
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($payslipDetail['earning']['otherPayment'] as $otherPayment)
                                <tr>
                                    <td>{{__('Other Payment')}}</td>
                                    <td>{{$otherPayment->title}}</td>
                                    <td class="text-right">{{  \Auth::user()->priceFormat( $otherPayment->amount)}}</td>
                                </tr>
                            @endforeach
                            @foreach($payslipDetail['earning']['overTime'] as $overTime)
                                <tr>
                                    <td>{{__('OverTime')}}</td>
                                    <td>{{$overTime->title}}</td>
                                    <td class="text-right">{{  \Auth::user()->priceFormat( $overTime->amount)}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tbody>
                                <tr class="font-weight-bold">
                                    <th>{{__('Deduction')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th class="text-right">{{__('Amount')}}</th>
                                </tr>

                                @foreach($payslipDetail['deduction']['loan'] as $loan)
                                    <tr>
                                        <td>{{__('Loan')}}</td>
                                        <td>{{$loan->title}}</td>
                                        <td class="text-right">{{  \Auth::user()->priceFormat( $loan->amount)}}</td>
                                    </tr>
                                @endforeach
                                @foreach($payslipDetail['deduction']['deduction'] as $deduction)
                                    <tr>
                                        <td>{{__('Saturation Deduction')}}</td>
                                        <td>{{$deduction->title}}</td>
                                        <td class="text-right">{{  \Auth::user()->priceFormat( $deduction->amount)}}</td>
                                    </tr>
                                @endforeach
                                @foreach($payslipDetail['absence']['absence'] as $absence)
                                    <tr>
                                        <td>{{__('Absence')}}</td>
                                        <td>{{$absence->type}}</td>
                                        <td class="text-right">{{  \Auth::user()->priceFormat( $absence->discount_amount)}}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td>{{__('social_insurance')}}</td>
                                    <td>{{__('on_employee')}}</td>
                                    <td class="text-right">{{  \Auth::user()->priceFormat($employee->insurance($payslip->employee_id,'employee'))}}</td>
                                </tr>

                                <tr>
                                    <td>{{__('social_insurance')}}</td>
                                    <td>{{__('on_company')}}</td>
                                    <td class="text-right">{{  \Auth::user()->priceFormat($employee->insurance($payslip->employee_id,'company'))}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- Totals -->
                    <div class="row mt-4" style="direction: ltr">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-8">
                            <div class="bg-light p-3 rounded">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="fw-medium">{{ __('Total Earnings') }}:</span>
                                    <span class="fw-bold">{{ \Auth::user()->priceFormat($payslipDetail['totalEarning']) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="fw-medium">{{ __('Total Deductions') }}:</span>
                                    <span class="fw-bold">{{ \Auth::user()->priceFormat($payslipDetail['totalDeduction'] + $insurance) }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">{{ __('Net Salary') }}:</span>
                                    <span class="fw-bold text-primary">
                            {{ \Auth::user()->priceFormat(($payslip->basic_salary + $payslipDetail['totalEarning']) - ($payslipDetail['totalDeduction'] + $insurance)) }}
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-md-right pb-2 text-sm">
            <div class="float-lg-left mb-lg-0 mb-3 ">
                <p class="mt-2">{{__('Employee Signature')}}</p>
            </div>
            <p class="mt-2 "> {{__('Paid By')}}</p>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
<script>

    function saveAsPDF() {
        var element = document.getElementById('printableArea');
        var opt = {
            margin: 0.3,
            filename: '{{$employee->name}}',
            image: {type: 'jpeg', quality: 1},
            html2canvas: {scale: 4, dpi: 72, letterRendering: true},
            jsPDF: {unit: 'in', format: 'A4'}
        };
        html2pdf().set(opt).from(element).save();
    }

</script>
