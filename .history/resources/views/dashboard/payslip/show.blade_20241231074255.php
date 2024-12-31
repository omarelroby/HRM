<div class="card bg-none card-box">
    <div class="col-md-12">
        <div class="card bg-none card-box">
            <form>
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <h5 class="emp-title mb-0">{{ __('Employee Detail') }}</h5>
                        <h5 class="emp-title black-text">{{ !empty($payslip->employees) ? \Auth::user()->employeeIdFormat($payslip->employees->employee_id) : '' }}</h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5 class="emp-title mb-0">{{ __('Basic Salary') }}</h5>
                        <h5 class="emp-title black-text">{{ \Auth::user()->priceFormat($payslip->basic_salary) }}</h5>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5 class="emp-title mb-0">{{ __('Payroll Month') }}</h5>
                        <h5 class="emp-title black-text">{{ \Auth::user()->dateFormat($payslip->salary_month) }}</h5>
                    </div>
                </div>

                <!-- Tabs Section -->
                <div class="col-md-12 our-system">
                    <ul class="nav nav-tabs my-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#allowance">{{ __('Allowance') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#insurance">{{ __('Social Insurance') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#commission">{{ __('Commission') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#loan">{{ __('Loan') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#deduction">{{ __('Saturation Deduction') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#payment">{{ __('Other Payment') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#overtime">{{ __('Overtime') }}</a>
                        </li>
                    </ul>

                    <!-- Tab Contents -->
                    <div class="tab-content">
                        <!-- Allowance Tab -->
                        <div id="allowance" class="tab-pane fade show active">
                            <div class="card bg-none mb-3">
                                <div class="table-responsive">
                                    @php
                                        $allowances = json_decode($payslip->allowance);
                                    @endphp
                                    <table class="table align-items-center">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allowances as $allowance)
                                                <tr>
                                                    <td>{{ $allowance->title }}</td>
                                                    <td>{{ \Auth::user()->priceFormat($allowance->amount) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Insurance Tab -->
                        <div id="insurance" class="tab-pane fade">
                            <div class="card bg-none mb-3">
                                <div class="table-responsive">
                                    <table class="table align-items-center">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ __('On Employee') }}</td>
                                                <td class="text-right">{{ \Auth::user()->priceFormat($employee->insurance($payslip->employee_id, 'employee')) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('On Company') }}</td>
                                                <td class="text-right">{{ \Auth::user()->priceFormat($employee->insurance($payslip->employee_id, 'company')) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Commission Tab -->
                        <div id="commission" class="tab-pane fade">
                            <div class="card bg-none mb-3">
                                <div class="table-responsive">
                                    @php
                                        $commissions = json_decode($payslip->commission);
                                    @endphp
                                    <table class="table align-items-center">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commissions as $commission)
                                                <tr>
                                                    <td>{{ $commission->title }}</td>
                                                    <td>{{ \Auth::user()->priceFormat($commission->amount) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Loan Tab -->
                        <div id="loan" class="tab-pane fade">
                            <div class="card bg-none mb-3">
                                <div class="table-responsive">
                                    @php
                                        $loans = json_decode($payslip->loan);
                                    @endphp
                                    <table class="table align-items-center">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($loans as $loan)
                                                <tr>
                                                    <td>{{ $loan->title }}</td>
                                                    <td>{{ \Auth::user()->priceFormat($loan->amount) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Deduction Tab -->
                        <div id="deduction" class="tab-pane fade">
                            <div class="card bg-none mb-3">
                                <div class="table-responsive">
                                    @php
                                        $saturation_deductions = json_decode($payslip->saturation_deduction);
                                    @endphp
                                    <table class="table align-items-center">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($saturation_deductions as $deduction)
                                                <tr>
                                                    <td>{{ $deduction->title }}</td>
                                                    <td>{{ \Auth::user()->priceFormat($deduction->amount) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Other Payment Tab -->
                        <div id="payment" class="tab-pane fade">
                            <div class="card bg-none mb-3">
                                <div class="table-responsive">
                                    @php
                                        $other_payments = json_decode($payslip->other_payment);
                                    @endphp
                                    <table class="table align-items-center">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($other_payments as $payment)
                                                <tr>
                                                    <td>{{ $payment->title }}</td>
                                                    <td>{{ \Auth::user()->priceFormat($payment->amount) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Overtime Tab -->
                        <div id="overtime" class="tab-pane fade">
                            <div class="card bg-none mb-3">
                                <div class="table-responsive">
                                    @php
                                        $overtimes = json_decode($payslip->overtime);
                                    @endphp
                                    <table class="table align-items-center">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($overtimes as $overtime)
                                                <tr>
                                                    <td>{{ $overtime->title }}</td>
                                                    <td>{{ \Auth::user()->priceFormat($overtime->rate) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Net Salary Section -->
                <div class="col-md-4 py-3">
                    <h5 class="emp-title mb-0">{{ __('Net Salary') }}</h5>
                    <h5 class="emp-title black-text">{{ \Auth::user()->priceFormat($payslip->net_payble) }}</h5>
                </div>
            </form>
        </div>
    </div>
</div>
