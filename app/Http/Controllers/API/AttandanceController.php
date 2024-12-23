<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\AttendanceResource;
use App\Http\Resources\HolidayResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Mail\sendemail;
use App\Models\User;
use App\Models\Employee;
use App\Traits\ApiResponser;
use App\Models\AttendanceEmployee;
use App\Models\Absence;
use App\Models\Holiday;
use App\Models\Utility;
use Carbon\carbon;

class AttandanceController extends BaseController
{
    use ApiResponser;    

    
    public function index()
    {
        $attendance = AttendanceResource::collection(AttendanceEmployee::where('employee_id', auth()->user()->employee->id)->get())->toArray(request());
        $holidays   = HolidayResource::collection(Holiday::where('created_by',\Auth::user()->company->id)->get())->toArray(request());
        $absences   = Absence::where('employee_id', auth()->user()->employee->id)->get();

        $absenceArr = [];
        $type = '';
        foreach($absences as $absence)
        {
            for($i = 0 ; $i < $absence->number_of_days ; $i++){
                if($absence->type == 'V')
                {
                    $type = 'vacation';
                }elseif($absence->type == "A"){
                    $type = 'absent';
                }elseif($absence->type == "X"){
                    $type = 'xabsent';
                }elseif($absence->type == "S"){
                    $type = 'sick';
                }

                array_push($absenceArr,[
                    'date'            => Carbon::parse($absence->start_date)->addDay($i)->format('Y-m-d'),
                    'Activity_type'   => 'Attendance',
                    'activity_status' => $type,
                    'title'           => $type,
                    'clock_in'        => '00:00:00',
                    'clock_out'       => '00:00:00',
                ]);
            }
        }

        $response  = array_merge($attendance,$absenceArr,$holidays);
        array_multisort(array_column($response, 'date'), SORT_DESC, $response);
        $response = $this->paginate($response);
        return $this->success($response,'');
    }

    public function start_work(Request $request)
    {
        $employee          = Employee::where('user_id',auth()->id())->first();
        $companySetting    = company_setting()->toArray(request());
        
        $company_grace_period   = Utility::getValByName('company_grace_period');
        $startTime              = \Carbon\Carbon::parse(Utility::getValByName('company_start_time'))->addMinutes($company_grace_period);
        $in                     = date("H:i:s", strtotime(date('H:i:s')));
        
        if($employee->haveAttendanceToday()){
            return $this->error(__('messages.youStartWorkBefore'), 401);
        }

        if(time() < strtotime($companySetting['start_time'] . " -" . $companySetting['grace_period_before'] . "minutes")) {
            return $this->error(__('messages.youAreTooEarly') . date('h:i a', strtotime($companySetting['start_time'])), 401);
        }

        // if(time() > strtotime($companySetting['start_time'] . " +" . $companySetting['grace_period'] . "minutes")) {
        //     return $this->error(__('messages.youAreTooLate'), 401);
        // }

        if(strtotime($in) > strtotime($startTime))
        {
            $totalLateSeconds = strtotime($in) - strtotime($startTime);
            $hours  = floor($totalLateSeconds / 3600);
            $mins   = floor($totalLateSeconds / 60 % 60);
            $secs   = floor($totalLateSeconds % 60);
            $late1  = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
        }else{
            $late1 = "00:00:00";
        }

        $newattandance = AttendanceEmployee::create([
            'employee_id'      => $employee->id,
            'status'           => 'Present',
            'date'             => date('Y-m-d'),
            'clock_in'         => date('H:i:s'),
            'company_id'       => $employee->created_by,
            'lat'              => $request['lat'],
            'lon'              => $request['lon'],
            'in_company_range' => 1,
            'late'             => $late1,
            'total_rest'       => '00:00:00',
            'delay_reason'     => $request->delay_reason,
            'created_by'       => \Auth::user()->creatorId(),
        ]);
        
        return $this->success([], __('messages.startWork'), 200);
    }

    public function end_work(Request $request)
    {
        $employee          = Employee::where('user_id',auth()->id())->first();
        $companySetting    = company_setting()->toArray(request());
        $attendance        = $employee->haveAttendanceToday();

        $endTime           = \Carbon\Carbon::parse(Utility::getValByName('company_end_time'));
        $out               = date("H:i:s", strtotime(date('H:i:s')));

        if(!$attendance){
            return $this->error(__('messages.notStartWorkToday'), 400);
        }

        // if($attendance->clock_out){
        //     return $this->error(__('messages.youEndYourWorkBefore'), 400);
        // }

        if(strtotime($out) < strtotime('8:00'))
        {
            $totalOvertimeSeconds = strtotime('8:00') - strtotime($out);

            $hours                = floor($totalOvertimeSeconds / 3600);
            $mins                 = floor($totalOvertimeSeconds / 60 % 60);
            $secs                 = floor($totalOvertimeSeconds % 60);
            $late2                = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
        }
        else
        {
            $late2 = "00:00:00";
        }

        $late1 = strtotime($attendance->late);
        $late2 = strtotime($late2);

        $late  = \Carbon\Carbon::parse( ($late1 + $late2) )->format("H:i:s");

        //early Leaving
        $totalEarlyLeavingSeconds = strtotime($endTime) - strtotime($out);
        $hours                    = floor($totalEarlyLeavingSeconds / 3600);
        $mins                     = floor($totalEarlyLeavingSeconds / 60 % 60);
        $secs                     = floor($totalEarlyLeavingSeconds % 60);
        $earlyLeaving             = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

        if($out > strtotime('8:00'))
        {
            //Overtime
            $totalOvertimeSeconds = strtotime($out) - strtotime('8:00');
            $hours                = floor($totalOvertimeSeconds / 3600);
            $mins                 = floor($totalOvertimeSeconds / 60 % 60);
            $secs                 = floor($totalOvertimeSeconds % 60);
            $overtime             = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
        }
        else
        {
            $overtime = '00:00:00';
        }

        $attendance->update([
            'clock_out'             => $out,
            'late'                  => $late,
            'early_leaving'         => ($earlyLeaving > 0) ? $earlyLeaving : '00:00:00',
            'overtime'              => $overtime,
            'urgent_end_reason'     => $request->urgent_end_reason,
        ]);

        return $this->success([], __('messages.endWork'), 200);
    }
    
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    
}
