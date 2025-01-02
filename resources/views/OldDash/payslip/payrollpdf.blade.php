@php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
@endphp

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> {{__('Monthly payroll Log')}} </title>
        <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
        @if(env('SITE_RTL') == 'on' || app()->getLocale() == "ar")
            <link href="{{ asset('admin/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
        @endif
        <link href="{{ asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    </head>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size:10px;
        }

        td{
            text-align:center;
            width:5%;
        }

        th{
            background: rgb(0 0 0 / 50%);
            text-align:center;
            width:5%;
        }
        
    </style>
  

    <body>
        <div class="card container mt-4 bg-none card-box">
            <h5 class="text-center d-print-none">
                <a href="" class="btn" onclick="window.print()"> <i class="fa fa-print"></i> </a>
                <a href="" class="btn download-pdf"> <i class="fa fa-download"></i> </a>
             </h5>

            <div class="invoice " style="padding:1%;" id="printableArea">

                <div class="row text-sm">
                    <div class="col-md-4">
                        <address style="text-align:right">
                            <p> {{\Utility::getValByName('company_name')}} </p> 
                            <p> {{__('Created By')}}  {{\Auth()->user()->name}} </p>
                            <p></p>
                        </address>
                    </div>

                    <div class="col-md-4">
                        <h4 style="border:3px solid;padding:1%;" class="text-center"> {{__('Monthly payroll Log')}} </h4>
                        <h5 class="text-center"> {{ $months[$month] .' - '.$year }}</h5>
                    </div>

                    <div class="col-md-4">
                        <address>
                            <p> {{date("Y/m/d")}} </p>
                            <p> {{date("H:i:s")}} </p>
                            <p></p>
                        </address>
                    </div>
                </div>

                <div class="invoice-print">

                    <table  class="border-0" width="100%">
                        <thead>
                            <tr>
                                <th>كود الموظف</th>
                                <th>الإسم</th>
                                <th>الوظيفة</th>
                                <th>أيام العمل</th>
                                <th>الأساسى الفعلى</th>
                                
                                @foreach($allowoptions as $option)
                                    <th>{{$option['name'.$lang]}}</th>
                                @endforeach

                                <th>بدلات أخرى</th>
                                <th>وقت إضافى</th>
                                <th>نسبة المبيعات</th>
                                <th>مستحقات أخرى</th>
                                <th>إجمالى المستحق</th>
                                
                                <th>تأمينات الموظف الإجتماعية</th>
                                <th>تأمينات الموظف الطبية</th>
                                <th>غياب</th>
                                <th>مرضى</th>
                                <th>سلف مقدمة</th>
                                <th>إستقطاعات أخرى</th>
                                <th>إجمالى المستقطع</th>

                                <th>صافى الراتب</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="20" class="border-0 pt-3 pb-3"></td>
                            </tr>
                            @foreach($payslip as $employee)
                                @php
                                    $allowances               = json_decode($employee->allowance);
                                    $totalBasicSalary         += !empty($employee->basic_salary) ? $employee->basic_salary : 0; 
                                    $totalOtherAllowance      += collect(json_decode($employee->allowance))->whereNotIn('allowance_option',$allowoptions->pluck('id'))->sum('amount');
                                    $totalOverTime            += collect(json_decode($employee->overtime))->sum('rate');
                                    $totalCommission          += collect(json_decode($employee->commission))->sum('amount');
                                    $totalOtherPayment        += collect(json_decode($employee->other_payment))->sum('amount');
                                    $totalDue                 += $employee->getTotalDue($employee);
                                    $totalinsurance           += $employee->insurance($employee->id,'employee');
                                    $totalMedicalInsurance    += $employee->medical_insurance($employee->id,'employee');
                                    $totalAbsence             += (collect(json_decode($employee->absence))->where('type','A')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id)) * $salarysetting->absence_with_permission_discount
                                    + ( collect(json_decode($employee->absence))->where('type','X')->sum('number_of_days') * ($employee->getEmployeeSalaryPerDay($employee->id) * $salarysetting->absence_without_permission_discount ) );
                                    $totalAbsence_S           += (collect(json_decode($employee->absence))->where('type','S')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id) * $salarysetting->sick_absence_discount);
                                    $totalLoan                += collect(json_decode($employee->loan))->sum('amount');
                                    $totalsaturationDeduction += collect(json_decode($employee->saturation_deduction))->sum('amount');
                                    $totalDeduction           += $employee->getTotalDeduction($employee);
                                    $totalNetSalary           += $employee->getNetSalary($employee);
                                @endphp
                                <tr>
                                    <td>{{\Auth::user()->employeeIdFormat($employee->employee_id)}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{ $employee->employee($employee->id) ? $employee->employee($employee->id)->jobtitle['name'.$lang] : '' }}</td>
                                    <td>{{$employee->workdays($employee->id)}}</td>
                                    <td>{{!empty($employee->basic_salary) ? \Auth::user()->priceFormat($employee->basic_salary) : '0'}}</td>
                                    
                                    @foreach($allowoptions as $option)
                                        @php $totalallowance += collect(json_decode($employee->allowance))->where('allowance_option',$option->id)->sum('amount') @endphp
                                        <td> {{collect(json_decode($employee->allowance))->where('allowance_option',$option->id)->sum('amount')}} </td>
                                    @endforeach

                                    <td>
                                        {{ collect(json_decode($employee->allowance))->whereNotIn('allowance_option',$allowoptions->pluck('id'))->sum('amount') }}
                                    </td>

                                    <td>{{collect(json_decode($employee->overtime))->sum('rate') }}</td>

                                    <td>{{collect(json_decode($employee->commission))->sum('amount') }}</td>

                                    <td> {{collect(json_decode($employee->other_payment))->sum('amount') }} </td>

                                    <td>
                                        {{ $employee->getTotalDue($employee) }}
                                    </td>

                                    <td>{{$employee->insurance($employee->id,'employee')}}</td>
                                    <td>{{$employee->medical_insurance($employee->id,'employee')}}</td>
                                    <td>{{(collect(json_decode($employee->absence))->where('type','A')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id)  * $salarysetting->absence_with_permission_discount) 
                                    + (collect(json_decode($employee->absence))->where('type','X')->sum('number_of_days') * ($employee->getEmployeeSalaryPerDay($employee->id) * $salarysetting->absence_without_permission_discount ) ) }}</td>
                                    <td>{{(collect(json_decode($employee->absence))->where('type','S')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id) * $salarysetting->sick_absence_discount) }}</td>
                                    <td>{{collect(json_decode($employee->loan))->sum('amount') }}</td>
                                    <td>{{collect(json_decode($employee->saturation_deduction))->sum('amount') }}</td>
                                    <td>{{$employee->getTotalDeduction($employee)}}</td>
                                    
                                    <td>
                                        {{$employee->getNetSalary($employee)}}
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="20" class="border-0 pt-3 pb-3"></td>
                            </tr>

                            <tr>
                                <td colspan="4" class="pt-3 pb-3">{{__('Total')}}</td>
                                <td>{{\Auth::user()->priceFormat($totalBasicSalary) }}</td>
                                @foreach($allowoptions as $option)
                                    <td>{{\Auth::user()->priceFormat($totalallowance) }}</td>
                                @endforeach
                                <td>{{\Auth::user()->priceFormat($totalOtherAllowance )}}</td>
                                <td>{{\Auth::user()->priceFormat($totalOverTime)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalCommission)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalOtherPayment)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalDue)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalinsurance)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalMedicalInsurance)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalAbsence)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalAbsence_S)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalLoan)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalsaturationDeduction)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalDeduction)}}</td>
                                <td>{{\Auth::user()->priceFormat($totalNetSalary)}}</td>
                            </tr>
                        </tbody>
                    </table>    

                </div>

                <hr>

                <div class="text-md-right row pb-2 text-sm">
                    <div class="float-lg-left col-md-3 mb-lg-0 mb-3 ">
                        <p class="mt-2">{{__('Human Resources Officer')}}</p>
                        <p> ................................ </p>
                    </div>
                    <div class="float-lg-left col-md-3 mb-lg-0 mb-3 ">
                        <p class="mt-2">{{__('Human Resources Manager')}}</p>
                        <p> ................................ </p>
                    </div>
                    <div class="float-lg-left col-md-3 mb-lg-0 mb-3 ">
                        <p class="mt-2">{{__('financial manager')}}</p>
                        <p> ................................ </p>
                    </div>
                    <div class="float-lg-left col-md-3 mb-lg-0 mb-3 ">
                        <p class="mt-2">{{__('CEO')}}</p>
                        <p> ................................ </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="{{ asset('admin/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{ asset('admin/js/popper.min.js')}} "></script>
        <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>

        <script>
            function saveAsPDF() {
                var element = document.getElementById('printableArea');
                var opt = {
                    margin: 0.3,
                    filename: 'Payroll - {{ $months[$month] .' - '.$year }}',
                    image: {type: 'jpeg', quality: 1},
                    html2canvas: {scale: 6, dpi: 100, letterRendering: true},
                    jsPDF: {unit: 'in', format: 'A4',orientation: 'landscape'}
                };
                html2pdf().set(opt).from(element).save();
            }

            $('.download-pdf').on('click' , function(e){
                e.preventDefault();
                saveAsPDF();
            })

        </script>

    </body>
</html>

