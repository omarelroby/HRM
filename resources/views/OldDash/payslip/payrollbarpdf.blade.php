@php
    header('Access-Control-Allow-Origin: *');
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $profile=asset(Storage::url('uploads/avatar/'));
@endphp

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> {{__('Salary Receipt')}} </title>        
    </head>

    <style>
        * {
            padding: 0px;
            margin: 0px;
        }

        body {
            background: #ccc;
        }
        .ar{
            direction:rtl;
        }

        tfoot {
            font-size:20px;
        }

        .logo_img svg{
            width:100px;
            height:100px;
        }
        .order_ {
            font-family: Arial, Helvetica, sans-serif;
            background: #fff;
            width: 600px;
            height:100vh;
            margin: auto;
            padding: 5px;
            font-size: 14px;
        }

        @media print {
          .order_ {
               height:auto;
              page-break-inside: avoid}
        }


        .orderItems {
            justify-content: space-between;
            align-items: center;
            margin: 13px 0px;
            padding:1%;
        }

        table, th, td {
        border:1px solid black;
        }

        .logo {
            align-items: center;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #f7f7f7;
        }

        .logo h1 {
            margin-bottom: 10px;
        }

        #scissors {
            height: 43px;
            width: 100%;
            margin: auto auto;
            background-image: url('http://i.stack.imgur.com/cXciH.png');
            background-size: 5% 40%;
            background-repeat: no-repeat;
            background-position: right;
            position: relative;
        }
        #scissors div {
            position: relative;
            top: 50%;
            border-top: 3px dashed black;
            margin-top: -3px;
        }

        .ForderItems {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .order_total {
            display: flex;
            justify-content: space-between;
        }

        .Receivedby {
            border-bottom: 1px #ccc dashed;
            padding-bottom: 17px;
            width: 144px;
            text-align: center;
        }

        .date_logo {
            display: flex;
            flex-direction: column;
        }

        .date_logo span:last-child {
            margin-top: 7px;
        }

        .scissor {
     
            margin: 16px 0px;
        }

        .scissor img {
            width: 100%;
            height: 14px;
        }
    </style>

    <script>
            var P = {
              l : ['صفر', ' ألف'],
              unis : ['', 'واحد', 'اثنين', 'ثلاثة', 'أربعة', 'خمسة', 'ستة', 'سبعة', 'ثمانية', 'تسعة'],
              tens : ['', 'عشرة', 'عشرون', 'ثلاثون', 'أربعون', 'خمسون', 'ستون', 'سبعون', 'ثمانون', 'تسعون'],
             xtens : ['عشرة', 'أحد عشر', 'اثنا عشر', 'ثلاثة عشر', 'أربعة عشر', 'خمسة عشر', 'ستة عشر', 'سبعة عشر', 'ثمانية عشر', 'تسعة عشر'],
              huns : ['', 'مائة', 'مئتان', 'ثلاثمائة', 'اربعمائة', 'خمسمائة', 'ستمائة', 'سبعمائة', 'ثمانمائة', 'تسعمائة'],
              thos : ['', 'ألف', 'ألفان', 'ثلاثة ألاف', 'اربعة ألاف', 'خمسة ألاف', 'ستة ألاف', 'سبعة ألاف', 'ثمانية ألاف', 'تسعة ألاف'],
             xthos : ['عشرة ألاف', 'أحد عشر ألف', 'اثنا عشر ألف', 'ثلاثة عشر ألف', 'أربعة عشر ألف', 'خمسة عشر ألف', 'ستة عشر ألف', 'سبعة عشر ألف', 'ثمانية عشر ألف', 'تسعة عشر ألف'],
               and : 'و',
            };

            var P_en = {
              l : ['zero', ' thousand'],
              unis : ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'],
              tens : ['', 'ten', 'twenty', 'thirty', 'Forty', 'fifty', 'Sixty', 'seventy', 'Eighty', 'ninety'],
             xtens : ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'],
              huns : ['', 'One hundred', 'two hundred', 'three hundred', 'four hundred', 'five hundred', 'six hundred', 'seven hundred', 'eight hundred', 'nine hundred'],
              thos : ['', 'one thousand', 'two thousand', 'three thousand', 'four thousand', 'five thousand', 'six thousand', 'seven thousand', 'eight thousand', 'nine thousand'],
             xthos : ['ten thousand', 'eleven thousand', 'twelve thousand', 'thirteen thousand', 'fourteen thousand', 'fifteen thousand', 'sixteen thousand', 'seventeen thousand', 'eighteen one thousand', 'nineteen thousand' ],
               and : 'and',
            };

            var N = '٠١٢٣٤٥٦٧٨٩';
            function replaceNumerals(s){
              if(!(/[٠١٢٣٤٥٦٧٨٩]+/).test(s))return s;
              let t = typeof(s);
              s = s.split('').map((o)=>{
                if(N.indexOf(o) != -1)
                  return N.indexOf(o);
                return o;
              }).join('');
              return t=="number"?~~s:s;
            }

            function replaceNumerals_en(s){
              if(!(/[٠١٢٣٤٥٦٧٨٩]+/).test(s))return s;
              let t = typeof(s);
              s = s.split('').map((o)=>{
                if(N.indexOf(o) != -1)
                  return N.indexOf(o);
                return o;
              }).join('');
              return t=="number"?~~s:s;
            }
            
            function pounds(y) {
                y = parseInt(y);
                y = replaceNumerals(y);
                s = y.toString().replace(/[\, ]/g, '');
                if (s != parseFloat(s)) return false;
                var x = s.indexOf('.');x = x==-1?s.length:x;
                if (x > 6 || s.length - x > 2) return false;
                y = parseFloat(s);
                d = y - ~~y;
                y = ~~y;
                if(!y)return P.l[0];
                let str = [], r, v = 0, p, c = ~~y%10, n, i = 1;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;
                do {
                  //Units
                  if(c > 0)str.push(P.unis[c]);
                  if(n===undefined)break;p = c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Tens
                  if(c == 1)str[0] = P.xtens[p];
                  if(c > 1){
                    if(v > 0)str.unshift(P.and);
                    str.unshift(P.tens[c]);
                  }
                  if(n===undefined)break;p = c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Hundreds
                  if(v > 0 && c > 0)str.push(P.and);
                  if(c > 0)str.push(P.huns[c]);
                  if(n===undefined)break;p = c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Thousands
                  if(v > 0 && c > 0 && !n)str.push(P.and);
                  if(c > 0 && !n)str.push(P.thos[c]);
                  if(n===undefined)break;p = c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Ten Thousands
                  if(v > 0 && c > 0 && y - c*1e4 - p*1e3 > 0)str.push(P.and);
                  if(c == 1)str.push(P.xthos[p]);
                  if(c > 1){
                    str.push(P.l[1]);
                    str.push(P.tens[c]);
                    if(p > 0){
                      str.push(P.and);
                      str.push(P.unis[p]);
                    }
                  }
                  if(n===undefined)break;p += 10*c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Hundred Thousands
                  if(v > 0 && c > 0)str.push(P.and);
                  if(c > 0){
                    if(!p)str.push(P.l[1]);
                    str.push(P.huns[c]);
                  }
                } while(false);
                return str.reverse().join(' ');
            }
            
            function pounds_en(y) {
                y = parseInt(y);
                y = replaceNumerals_en(y);
                s = y.toString().replace(/[\, ]/g, '');
                if (s != parseFloat(s)) return false;
                var x = s.indexOf('.');x = x==-1?s.length:x;
                if (x > 6 || s.length - x > 2) return false;
                y = parseFloat(s);
                d = y - ~~y;
                y = ~~y;
                if(!y)return P_en.l[0];
                let str = [], r, v = 0, p, c = ~~y%10, n, i = 1;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;
                do {
                  //Units
                  if(c > 0)str.push(P_en.unis[c]);
                  if(n===undefined)break;p = c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  if(n===undefined)break;p = c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Tens
                  if(c == 1)str[0] = P_en.xtens[p];
                  if(c > 1){
                    if(v > 0)str.unshift(P_en.and);
                    str.unshift(P_en.tens[c]);
                  }
                  //Hundreds
                  if(v > 0 && c > 0)str.push(P_en.and);
                  if(c > 0)str.push(P_en.huns[c]);
                  if(n===undefined)break;p = c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Thousands
                  if(v > 0 && c > 0 && !n)str.push(P_en.and);
                  if(c > 0 && !n)str.push(P_en.thos[c]);
                  if(n===undefined)break;p = c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Ten Thousands
                  if(v > 0 && c > 0 && y - c*1e4 - p*1e3 > 0)str.push(P_en.and);
                  if(c == 1)str.push(P_en.xthos[p]);
                  if(c > 1){
                    str.push(P_en.l[1]);
                    str.push(P_en.tens[c]);
                    if(p > 0){
                      str.push(P_en.and);
                      str.push(P_en.unis[p]);
                    }
                  }
                  if(n===undefined)break;p += 10*c;c = n;n = (r=~~(y/Math.pow(10,i++)))?r%10:undefined;v += p*Math.pow(10,i-3);
                  //Hundred Thousands
                  if(v > 0 && c > 0)str.push(P_en.and);
                  if(c > 0){
                    if(!p)str.push(P_en.l[1]);
                    str.push(P_en.huns[c]);
                  }
                } while(false);
                return str.reverse().join(' ');
            }


            function numberToArabic(s) {
                    var th = ['', 'ألف', 'مليون', 'مليار', 'تريليون'];
                var dg = ['صفر', 'واحد', 'اثنين', 'ثلاثة', 'أربعة', 'خمسة', 'ستة', 'سبعة', 'ثمانية', 'تسعة'];
                var tn = ['عشرة', 'أحد عشر', 'اثني عشر', 'ثلاثة عشر', 'أربعة عشر', 'خمسة عشر', 'ستة عشر', 'سبعة عشر', 'ثمانية عشر', 'تسعة عشر'];
                var tw = ['عشرون', 'ثلاثون', 'الأربعين', 'خمسين', 'ستين', 'السبعين', 'ثمانين', 'تسعين'];
                
                    s = s.toString();
                    s = s.replace(/[\, ]/g,'');
                    if (s != parseFloat(s)) return 'ليس رقم';
                    var x = s.indexOf('.');
                    if (x == -1)
                        x = s.length;
                    if (x > 15)
                        return 'too big';
                    var n = s.split('');
                    var str = '';
                    var sk = 0;
                    for (var i=0;   i < x;  i++) {
                        if ((x-i)%3==2) {
                            if (n[i] == '1') {
                                str += tn[Number(n[i+1])] + ' '+ ' ';
                                i++;
                                sk=1;
                            } else if (n[i]!=0) {
                                str += tw[n[i]-2] + ' ';
                                sk=1;
                            }
                        } else if (n[i]!=0) { // 0235
                            str = dg[n[i]] + ' ' + str + ' ';
                            if ((x-i)%3==0) str += 'مائة و ';
                            sk=1;
                        }
                        if ((x-i)%3==1) {
                            if (sk)
                                str += th[(x-i-1)/3] + ' ';
                            sk=0;
                        }
                    }
                
                    if (x != s.length) {
                        var y = s.length;
                        str += 'point ';
                        for (var i=x+1; i<y; i++)
                            str += dg[n[i]] +' ';
                    }
                    return str.replace(/\s+/g,' ');
                
                
                
            }
    
            function numberToEnglish(n, custom_join_character) {

                var string = n.toString(),
                    units, tens, scales, start, end, chunks, chunksLen, chunk, ints, i, word, words;
                
                var and = custom_join_character || 'and';
                
                /* Is number zero? */
                if (parseInt(string) === 0) {
                    return 'zero';
                }
                
                /* Array of units as words */
                units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
                
                /* Array of tens as words */
                tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
                
                /* Array of scales as words */
                scales = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quatttuor-decillion', 'quindecillion', 'sexdecillion', 'septen-decillion', 'octodecillion', 'novemdecillion', 'vigintillion', 'centillion'];
                
                /* Split user arguemnt into 3 digit chunks from right to left */
                start = string.length;
                chunks = [];
                while (start > 0) {
                    end = start;
                    chunks.push(string.slice((start = Math.max(0, start - 3)), end));
                }
                
                /* Check if function has enough scale words to be able to stringify the user argument */
                chunksLen = chunks.length;
                if (chunksLen > scales.length) {
                    return '';
                }
                
                /* Stringify each integer in each chunk */
                words = [];
                for (i = 0; i < chunksLen; i++) {
                
                    chunk = parseInt(chunks[i]);
                
                    if (chunk) {
                
                        /* Split chunk into array of individual integers */
                        ints = chunks[i].split('').reverse().map(parseFloat);
                
                        /* If tens integer is 1, i.e. 10, then add 10 to units integer */
                        if (ints[1] === 1) {
                            ints[0] += 10;
                        }
                
                        /* Add scale word if chunk is not zero and array item exists */
                        if ((word = scales[i])) {
                            words.push(word);
                        }
                
                        /* Add unit word if array item exists */
                        if ((word = units[ints[0]])) {
                            words.push(word);
                        }
                
                        /* Add tens word if array item exists */
                        if ((word = tens[ints[1]])) {
                            words.push(word);
                        }
                
                        /* Add 'and' string after units or tens integer if: */
                        if (ints[0] || ints[1]) {
                
                            /* Chunk has a hundreds integer or chunk is the first of multiple chunks */
                            if (ints[2] || !i && chunksLen) {
                                words.push(and);
                            }
                
                        }
                
                        /* Add hundreds word if array item exists */
                        if ((word = units[ints[2]])) {
                            words.push(word + ' hundred');
                        }
                
                    }
                
                }
                
                return words.reverse().join(' ');

            }

            function MoneyToWords(y){
                var y = '' +  (y).toFixed(1)
                y = y.replace(/,/g, '');
                y = parseFloat(y,2)
                document.write(pounds(y) + ' {{$settings['site_currency_symbol']}} '  )
                mmm = (parseFloat(y) - parseInt(y)).toFixed(2)
                mmm = mmm.toString().replace(/[\. ]/g, '');
                mmm = parseInt(mmm)
                mmm = replaceNumerals(mmm)
                if(mmm > 0){
                    document.write( ' و ' + pounds(mmm) + '  هللات فقط لا غير  '   )
                }
            }

            function MoneyToWords_en(y){
                var y = '' +  (y).toFixed(1)
                y = y.replace(/,/g, '');
                y = parseFloat(y,2)
                document.write(pounds_en(y) + ' {{$settings['site_currency_symbol']}} '  )
                mmm = (parseFloat(y) - parseInt(y)).toFixed(2)
                mmm = mmm.toString().replace(/[\. ]/g, '');
                mmm = parseInt(mmm)
                mmm = replaceNumerals_en(mmm)
                if(mmm > 0){
                    document.write( ' و ' + pounds(mmm) + '  هللات فقط لا غير  '   )
                }
            }

    </script>

    <body>   
        <div @if(env('SITE_RTL') == 'on' || app()->getLocale() == "ar") class="ar" @endif id="printableArea">
            @foreach($payslip as $employee)
            @php
                $allowances = json_decode($employee->allowance,true)
            @endphp
                <div class="order_">
                    <div class="logo">
                        <div class="logo_img">
                            <img style="width: 100px;" src="{{ \Auth::user()->avatar ? $profile.'/'.\Auth::user()->avatar : $profile.'/avatar.png'}}" />
                        </div>

                        <div>
                            <h4>{{__('Salary Receipt')}}</h4>
                            <div class="date" style="text-align: center;">{{ $months[$month]}} / <strong>{{$year}}</strong></div>
                        </div>

                        <div class="date_logo">
                            <span>{{date("Y/m/d")}}</span>
                            <span>{{date("H:i:s")}}</span>
                            <span> {{__('Created By')}}  {{\Auth()->user()->name}} </span>
                        </div>
                    </div>

                    <div class="front">

                        <div class="orderItems_">
                            <div class="orderItems">
                                <div class="order_item">
                                    <strong>{{__('employee')}} : </strong>
                                    <span>{{\Auth::user()->employeeIdFormat($employee->employee_id)}} - {{$employee->name}}</span>
                                </div>

                                <div class="order_item">
                                    <strong>{{__('Position')}} : </strong>
                                    <span>{{DB::table('jobtitles')->where('id',$employee->jobtitle_id)->value('name'.$lang)}}</span>
                                </div>

                                <div class="order_item">
                                    <strong>{{__('Branch')}} : </strong>
                                    <span>{{DB::table('branches')->where('id',$employee->branch_id)->value('name'.$lang)}}</span>
                                </div>

                                <div class="order_item">
                                    <strong>{{__('Department')}} : </strong>
                                    <span>{{DB::table('departments')->where('id',$employee->department_id)->value('name'.$lang)}}</span>
                                </div>
                            </div>
                        </div>

                        <table style="width:100%">
                            <tr>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Incomes')}}</th>
                                <th>{{__('Deduction')}}</th>
                            </tr>

                            @foreach($allowances as $allowance)
                                <tr>
                                    <td>{{$allowance['title']}}</td>
                                    <td>{{\Auth::user()->priceFormat($allowance['amount'])}}</td>
                                    <td></td>
                                </tr>
                            @endforeach

                            @if(collect(json_decode($employee->overtime))->sum('rate') != 0)
                                <tr>
                                    <td>وقت إضافى</td>
                                    <td>{{\Auth::user()->priceFormat(collect(json_decode($employee->overtime))->sum('rate') )}}</td>
                                    <td></td>
                                </tr>
                            @endif

                            @if(collect(json_decode($employee->commission))->sum('amount') != 0)
                                <tr>
                                    <td>نسبة المبيعات</td>
                                    <td>{{\Auth::user()->priceFormat( collect(json_decode($employee->commission))->sum('amount') )}}</td>
                                    <td></td>
                                </tr>
                            @endif

                            @if(collect(json_decode($employee->other_payment))->sum('amount') != 0)
                                <tr>
                                    <td>مستحقات أخرى</td>
                                    <td>{{\Auth::user()->priceFormat( collect(json_decode($employee->other_payment))->sum('amount') )}}</td>
                                    <td></td>
                                </tr>
                            @endif
                            
                            @if($employee->insurance($employee->id,'employee') != 0)
                                <tr>
                                    <td>تأمينات الموظف الإجتماعية</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( $employee->insurance($employee->id,'employee') ) }}</td>
                                </tr>
                            @endif

                            @if($employee->medical_insurance($employee->id,'employee') != 0)
                                <tr>
                                    <td>تأمينات الموظف الطبية</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( $employee->medical_insurance($employee->id,'employee') ) }}</td>
                                </tr>
                            @endif


                            @if((collect(json_decode($employee->absence))->where('type','A')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id)) != 0)
                                <tr>
                                    <td>غياب بإذن</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( (collect(json_decode($employee->absence))->where('type','A')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id)) ) }}</td>
                                </tr>
                            @endif

                            @if(( collect(json_decode($employee->absence))->where('type','X')->sum('number_of_days') * ($employee->getEmployeeSalaryPerDay($employee->id) * 2 ) ) != 0)
                                <tr>
                                    <td>غياب بدون إذن</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( ( collect(json_decode($employee->absence))->where('type','X')->sum('number_of_days') * ($employee->getEmployeeSalaryPerDay($employee->id) * 2 ) )  ) }}</td>
                                </tr>
                            @endif

                            @if((collect(json_decode($employee->absence))->where('type','S')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id) * 0.25))
                                <tr>
                                    <td>مرضى</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( (collect(json_decode($employee->absence))->where('type','S')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id) * 0.25) ) }}</td>
                                </tr>
                            @endif

                            @if(collect(json_decode($employee->loan))->sum('amount') != 0)
                                <tr>
                                    <td>سلف مقدمة</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( collect(json_decode($employee->loan))->sum('amount') ) }}</td>
                                </tr>
                            @endif

                            @if(collect(json_decode($employee->saturation_deduction))->sum('amount') != 0)
                                <tr>
                                    <td>إستقطاعات أخرى</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( collect(json_decode($employee->saturation_deduction))->sum('amount') ) }}</td>
                                </tr>
                            @endif

                            <tfoot>
                                <tr>
                                    <td><strong> {{__('Total')}} </strong> - [{{$employee->getNetSalary($employee)}}]</td>
                                    <td class="text-green">{{ \Auth::user()->priceFormat($employee->getTotalDue($employee) ) }}</td>
                                    <td class="text-danger">{{ \Auth::user()->priceFormat($employee->getTotalDeduction($employee)) }}</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="ForderItems">
                            <div class="Forder_item">
                                <span>
                                    @if(env('SITE_RTL') == 'on' || app()->getLocale() == "ar")
                                        @if( $employee->getNetSalary($employee) > 0)
                                            <script> MoneyToWords( {{  $employee->getNetSalary($employee) }} ) </script>
                                        @else
                                            - <script> MoneyToWords( {{  abs( $employee->getNetSalary($employee) ) }} ) </script>
                                        @endif 
                                    @else
                                        @if( $employee->getNetSalary($employee) > 0)
                                            <script> MoneyToWords( {{  $employee->getNetSalary($employee) }} ) </script>
                                        @else
                                            - <script> MoneyToWords( {{  abs( $employee->getNetSalary($employee) ) }} ) </script>
                                        @endif
                                    @endif
                                </span>
                            </div>

                            <div class="Receivedby">
                                <strong>{{__('Received By')}}</strong>
                                <p>-----------------------</p>
                            </div>
                        </div>
                    </div>
                    
                    <div id="scissors">
                        <div></div>
                    </div>

                    <div class="back">

                        <div class="orderItems_">
                            <div class="orderItems">
                                <div class="order_item">
                                    <strong>{{__('employee')}} : </strong>
                                    <span>{{\Auth::user()->employeeIdFormat($employee->employee_id)}} - {{$employee->name}}</span>
                                </div>

                                <div class="order_item">
                                    <strong>{{__('Position')}} : </strong>
                                    <span>{{DB::table('jobtitles')->where('id',$employee->jobtitle_id)->value('name'.$lang)}}</span>
                                </div>

                                <div class="order_item">
                                    <strong>{{__('Branch')}} : </strong>
                                    <span>{{DB::table('branches')->where('id',$employee->branch_id)->value('name'.$lang)}}</span>
                                </div>

                                <div class="order_item">
                                    <strong>{{__('Department')}} : </strong>
                                    <span>{{DB::table('departments')->where('id',$employee->department_id)->value('name'.$lang)}}</span>
                                </div>
                            </div>
                        </div>

                        <table style="width:100%">
                            <tr>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Incomes')}}</th>
                                <th>{{__('Deduction')}}</th>
                            </tr>

                            @foreach($allowances as $allowance)
                                <tr>
                                    <td>{{$allowance['title']}}</td>
                                    <td>{{\Auth::user()->priceFormat($allowance['amount'])}}</td>
                                    <td></td>
                                </tr>
                            @endforeach

                            @if(collect(json_decode($employee->overtime))->sum('rate') != 0)
                                <tr>
                                    <td>وقت إضافى</td>
                                    <td>{{\Auth::user()->priceFormat(collect(json_decode($employee->overtime))->sum('rate') )}}</td>
                                    <td></td>
                                </tr>
                            @endif

                            @if(collect(json_decode($employee->commission))->sum('amount') != 0)
                                <tr>
                                    <td>نسبة المبيعات</td>
                                    <td>{{\Auth::user()->priceFormat( collect(json_decode($employee->commission))->sum('amount') )}}</td>
                                    <td></td>
                                </tr>
                            @endif

                            @if(collect(json_decode($employee->other_payment))->sum('amount') != 0)
                                <tr>
                                    <td>مستحقات أخرى</td>
                                    <td>{{\Auth::user()->priceFormat( collect(json_decode($employee->other_payment))->sum('amount') )}}</td>
                                    <td></td>
                                </tr>
                            @endif
                            

                            @if($employee->insurance($employee->id,'employee') != 0)
                                <tr>
                                    <td>تأمينات الموظف الإجتماعية</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( $employee->insurance($employee->id,'employee') ) }}</td>
                                </tr>
                            @endif

                            @if($employee->medical_insurance($employee->id,'employee') != 0)
                                <tr>
                                    <td>تأمينات الموظف الطبية</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( $employee->medical_insurance($employee->id,'employee') ) }}</td>
                                </tr>
                            @endif


                            @if((collect(json_decode($employee->absence))->where('type','A')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id)) != 0)
                                <tr>
                                    <td>غياب بإذن</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( (collect(json_decode($employee->absence))->where('type','A')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id)) ) }}</td>
                                </tr>
                            @endif

                            @if(( collect(json_decode($employee->absence))->where('type','X')->sum('number_of_days') * ($employee->getEmployeeSalaryPerDay($employee->id) * 2 ) ) != 0)
                                <tr>
                                    <td>غياب بدون إذن</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( ( collect(json_decode($employee->absence))->where('type','X')->sum('number_of_days') * ($employee->getEmployeeSalaryPerDay($employee->id) * 2 ) )  ) }}</td>
                                </tr>
                            @endif

                            @if((collect(json_decode($employee->absence))->where('type','S')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id) * 0.25))
                                <tr>
                                    <td>مرضى</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( (collect(json_decode($employee->absence))->where('type','S')->sum('number_of_days') * $employee->getEmployeeSalaryPerDay($employee->id) * 0.25) ) }}</td>
                                </tr>
                            @endif

                            @if(collect(json_decode($employee->loan))->sum('amount') != 0)
                                <tr>
                                    <td>سلف مقدمة</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( collect(json_decode($employee->loan))->sum('amount') ) }}</td>
                                </tr>
                            @endif

                            @if(collect(json_decode($employee->saturation_deduction))->sum('amount') != 0)
                                <tr>
                                    <td>إستقطاعات أخرى</td>
                                    <td></td>
                                    <td>{{\Auth::user()->priceFormat( collect(json_decode($employee->saturation_deduction))->sum('amount') ) }}</td>
                                </tr>
                            @endif

                            <tfoot>
                                <tr>
                                    <td><strong> {{__('Total')}} </strong> - [{{$employee->getNetSalary($employee)}}]</td>
                                    <td class="text-green">{{ \Auth::user()->priceFormat($employee->getTotalDue($employee) ) }}</td>
                                    <td class="text-danger">{{ \Auth::user()->priceFormat($employee->getTotalDeduction($employee)) }}</td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="ForderItems">
                            <div class="Forder_item">
                                <span>
                                    @if(env('SITE_RTL') == 'on' || app()->getLocale() == "ar")
                                        @if( $employee->getNetSalary($employee) > 0)
                                            <script> MoneyToWords( {{  $employee->getNetSalary($employee) }} ) </script>
                                        @else
                                            - <script> MoneyToWords( {{  abs( $employee->getNetSalary($employee) ) }} ) </script>
                                        @endif 
                                    @else
                                        @if( $employee->getNetSalary($employee) > 0)
                                            <script> MoneyToWords( {{  $employee->getNetSalary($employee) }} ) </script>
                                        @else
                                            - <script> MoneyToWords( {{  abs( $employee->getNetSalary($employee) ) }} ) </script>
                                        @endif
                                    @endif
                                </span>
                            </div>

                            <div class="Receivedby">
                                <strong> {{__('Received By')}} </strong>
                                <p>-----------------------</p>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

        <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>

        <script> 
            function saveAsPDF() {
                var element = document.getElementById('printableArea');
                var opt = {
                    margin: 0.3,
                    filename: 'SalaryReceipt - {{ $months[$month] .' - '.$year }}',
                    image: {type: 'jpeg', quality: 1},
                    html2canvas: {scale: 6, dpi: 100, letterRendering: true},
                    jsPDF: {unit: 'in', format: 'A4',orientation: 'landscape'}
                };
                html2pdf().set(opt).from(element).save();
            }
            //saveAsPDF();
        </script>

    </body>
</html>

