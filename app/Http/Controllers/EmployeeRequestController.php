<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Branch;
use App\Models\EmployeeRequest;
use App\Models\RequestType;
use App\Mail\LeaveActionSend;
use App\Models\Utility;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Imports\EmployeesImport;
use App\Exports\LeaveExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeRequestController extends Controller
{
    public function index(Request $request)
    {
        if (\Auth::user()->can('Manage Leave')) {
            $lang = app()->getLocale() == 'ar' ? '_ar' : '';


            if (\Auth::user()->type == 'employee') {
                $employeeId = $request->employee_id;
                $lang = app()->getLocale() == 'ar' ? '_ar' : '';

                $employees = Employee::where('user_id', '=', \Auth::user()->id)->get()->pluck('name', 'id');
                $requesttypes = RequestType::where('created_by', '=', \Auth::user()->creatorId())->get();
                if (\Auth::user()->employee) {

                    $department = Department::findOrFail(Auth::user()->employee->department_id);
                    if ($department) {
                        // Check if the employee is a department manager
                        if (\Auth::user()->employee->department_id == $department->id && \Auth::user()->employee->sub_dep_id == 0) {
                            // Show all employees in the department
                            $employeesIds = $department->employeess->pluck('id');
                            $leaves = EmployeeRequest::whereIn('employee_id', $employeesIds)->get();
                        }
                        // Check if the employee is a sub-department manager
                        elseif (\Auth::user()->employee->section_id == 0) {
                            // Show only employees in the sub-department
                            $employeesIds = Employee::where('sub_dep_id', \Auth::user()->employee->sub_dep_id)->pluck('id');
                            $leaves = EmployeeRequest::whereIn('employee_id', $employeesIds)->get();
                        }
                        else{
                            $leaves = EmployeeRequest::where('employee_id',  \Auth::user()->employee->id)->get();

                        }
                    }
                }
            } else {
                $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
                $employeeId = $request->employee_id;

                $requesttypes = RequestType::where('created_by', '=', \Auth::user()->creatorId())->get();

                $leaves = EmployeeRequest::where('created_by', '=', \Auth::user()->creatorId())->get();
                if (\Auth::user()->employee) {
                    $department = Department::where('employee_id', \Auth::user()->employee->id)->first();
                    if ($department) {
                        $employeesIds = $department->employeess->pluck('id');
                        $leaves = EmployeeRequest::whereIn('employee_id', $employeesIds)->get();
                    }

                    $branch = Branch::where('employee_id', \Auth::user()->employee->id)->first();
                    if ($branch) {
                        $employeesIds = $branch->employeess->pluck('id');
                        $leaves = EmployeeRequest::whereIn('employee_id', $employeesIds)->get();
                    }
                }
            }

            return view('dashboard.employee_requests.index', compact('leaves', 'lang', 'employees', 'requesttypes', 'employeeId'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function create(Request $request)
    {
        if(\Auth::user()->can('Create Leave'))
        {
            $employeeId = $request->employee_id;
            $lang         = app()->getLocale() == 'ar' ? '_ar' : '';
            if(Auth::user()->type == 'employee')
            {
                $employees  = Employee::where('user_id', '=', \Auth::user()->id)->get()->pluck('name', 'id');
            }
            else
            {
                $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            }
            $requesttypes      = RequestType::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('employee_requests.create', compact('employees', 'lang','requesttypes','employeeId'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Leave'))
        {
            $validator = \Validator::make(
            $request->all(),
            [
                'request_type_id'   => 'required',
                'start_date'        => 'required',
                'end_date'          => 'required',
                'request_reason'    => 'required',
                'request_reason_ar' => 'required',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $employee = Employee::where('user_id', '=', Auth::user()->id)->first();

            $input    = $request->all();
            if(\Auth::user()->type == "employee")
            {
                $input['employee_id'] = $employee->id;
            }
            else
            {
                $input['employee_id'] = $request->employee_id;
            }

            $input['applied_on']       = date('Y-m-d');
            $input['status']           = 0;
            $input['created_by']       = \Auth::user()->creatorId();
            $employee_request          = EmployeeRequest::create($input);

//            if($employee->department->employees)
//            {
//                $newnotification              = new Notification;
//                $newnotification->user_id     = $employee->department->employees->user_id;
//                $newnotification->type        = 'employee_requests';
//                $newnotification->title       = $employee_request->requestType->name;
//                $newnotification->title_ar    = $employee_request->requestType->name_ar;
//                $newnotification->body        = 'Employee '.Auth::user()->name.' Want '.$employee_request->requestType->name.' Request';
//                $newnotification->body_ar     = 'الموظف '.Auth::user()->name.' يريد طلب '.$employee_request->requestType->name_ar;
//                $newnotification->created_by  = Auth::user()->id;
//                $newnotification->save();
//            }

            return redirect()->back()->with('success', __('Request  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(EmployeeRequest $employee_request)
    {
        return redirect()->route('employee_requests.index');
    }

    public function edit(EmployeeRequest $employee_request)
    {
        if(\Auth::user()->can('Edit Leave'))
        {
            if($employee_request->created_by == \Auth::user()->creatorId())
            {
                $employeeId   = $employee_request->employee_id;
                $lang         = app()->getLocale() == 'ar' ? '_ar' : '';
                $employees    = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
                $leavetypes   = RequestType::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
                return view('dashboard.employee_requests.edit', compact('employee_request','employeeId', 'employees', 'leavetypes'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, EmployeeRequest $employee_request)
    {
        if (\Auth::user()->can('Edit Leave')) {
            if ($employee_request->created_by == Auth::user()->creatorId()) {
//                $validator = \Validator::make(
//                    $request->all(),
//                    [
//                        'request_type_id'   => 'required',
//                        'start_date'        => 'required',
//                        'end_date'          => 'required',
//                        'request_reason'    => 'required',
//                        'request_reason_ar' => 'required',
//                        'status'            => 'required|in:0,1,2,3,4,5,6', // Validate status values
//                        'reject_reason'     => 'required_if:status,2,4,6', // Reject reason is required for status 2, 4, 6
//                    ]
//                );
//
//                if ($validator->fails()) {
//                    $messages = $validator->getMessageBag();
//                    return redirect()->back()->with('error', $messages->first());
//                }

                // Update the employee request
                $input = $request->all();

                // Clear reject_reason if status is not 2, 4, or 6
                if (!in_array($request->status, [2, 4, 6])) {
                    $input['reject_reason'] = null;
                }

                $employee_request->update($input);

                return redirect('employee_requests')->with('success', __('Leave successfully updated.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function destroy(EmployeeRequest $employee_request)
    {
        if(\Auth::user()->can('Delete Leave'))
        {
            if($employee_request->created_by == \Auth::user()->creatorId())
            {
                $employee_request->delete();
                return redirect()->back()->with('success', __('Leave successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function export()
    {
        $name = 'leave_' . date('Y-m-d i:h:s');
        $data = Excel::download(new LeaveExport(), $name . '.xlsx'); if(ob_get_contents()) ob_end_clean();
        return $data;
    }

    public function action($id)
    {
        $employee_request     = EmployeeRequest::find($id);
        $employee             = Employee::find($employee_request->employee_id);
        $requesttype          = RequestType::find($employee_request->request_type_id);
        return view('employee_requests.action', compact('employee', 'requesttype', 'employee_request'));
    }

    public function changeaction(Request $request)
    {
        $employee_request = EmployeeRequest::find($request->leave_id);
        $employee_request->update(['status' => $request->status]);

        $status_ar                    = $request->status == 1 || $request->status == 3 ? 'يوافق على طلب' : 'يرفض طلب';
        $status_en                    = $request->status == 2 || $request->status == 4 ? 'Approve' : 'Reject';

        $newnotification              = new Notification;
        $newnotification->user_id     = $employee_request->employees->user_id;
        $newnotification->type        = 'employee_requests';
        $newnotification->title       = $employee_request->requestType->name;
        $newnotification->title_ar    = $employee_request->requestType->name_ar;
        if($request->status ==  1 || $request->status == 2)
        {
            $newnotification->body        = 'Department Manager '.Auth::user()->name.' '.$status_en.' '.$employee_request->requestType->name.' Request';
            $newnotification->body_ar     = 'مدير القسم '.Auth::user()->name.' '.$status_ar.' '.$employee_request->requestType->name_ar;
        }elseif($request->status ==  3 || $request->status == 4)
        {
            $newnotification->body        = 'Branch Manager '.Auth::user()->name.' '.$status_en.' '.$employee_request->requestType->name.' Request';
            $newnotification->body_ar     = 'مدير الفرع '.Auth::user()->name.' '.$status_ar.' '.$employee_request->requestType->name_ar;
        }

        $newnotification->created_by  = Auth::user()->id;
        $newnotification->save();

        // twilio
        $setting = Utility::settings(\Auth::user()->creatorId());
        $emp     = Employee::find($employee_request->employee_id);
        if (isset($setting['twilio_leave_approve_notification']) && $setting['twilio_leave_approve_notification'] == 1) {
        $msg = __("Your leave has been").' '.$employee_request->status.'.';
        Utility::send_twilio_msg($emp->phone,$msg);
        }

        $setings = Utility::settings();
        if($setings['leave_status'] == 1)
        {
            $employee     = Employee::where('id', $employee_request->employee_id)->where('created_by', '=', \Auth::user()->creatorId())->first();
            $employee_request->name  = !empty($employee->name) ? $employee->name : '';
            $employee_request->email = !empty($employee->email) ? $employee->email : '';
            try
            {
                Mail::to($employee_request->email)->send(new LeaveActionSend($employee_request));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->route('employee_requests.index')->with('success', __('Leave status successfully updated.') . (isset($smtp_error) ? $smtp_error : ''));
        }

        return redirect()->route('employee_requests.index')->with('success', __('Leave status successfully updated.'));
    }

    public function jsoncount(Request $request)
    {
        $leave_counts = RequestType::select(\DB::raw('COALESCE(SUM(leaves.total_leave_days),0) AS total_leave, leave_types.title, leave_types.days,leave_types.id'))
                                 ->leftjoin('leaves', function ($join) use ($request){
            $join->on('leaves.leave_type_id', '=', 'leave_types.id');
            $join->where('leaves.employee_id', '=', $request->employee_id);
        }
        )->groupBy('leaves.leave_type_id')->get();

        return $leave_counts;

    }
    public function actionupdateStatus(Request $request, $id)
    {

        if (auth()->user()->type == 'employee') {
            $emp_request = EmployeeRequest::findOrFail($id);
            $dep = auth()->user()->employee->department_id;
            $sub_dep = auth()->user()->employee->sub_dep_id;
            $section_id = auth()->user()->employee->section_id;

            if ($dep && $sub_dep == 0) {
                if ($request->status == 1) {
                    $emp_request->status = 1;
                } else {
                    $emp_request->status = 2;
                    $emp_request->reject_reason = $request->reason;
                }
                $emp_request->save();
            } elseif ($sub_dep && $section_id == 0) {
                if ($request->status == 1) {
                    $emp_request->status = 3;
                } else {
                    $emp_request->status = 4;
                    $emp_request->reject_reason = $request->reason;

                }
                $emp_request->save();
            }

            return response()->json(['success' => __('Status updated successfully.'),'status' => 1]);
        }
        elseif (auth()->user()->type == 'company')
        {
            $emp_request = EmployeeRequest::findOrFail($id);
            if ($request->status == 1) {
                $emp_request->status =5;

            } else {
                $emp_request->status = 6;
                $emp_request->reject_reason = $request->reason;

            }
            $emp_request->save();

            return response()->json(['success' => __('Status updated successfully.'),'status' => 1]);

        }
        else {
            return response()->json(['error' => __('Permission denied.')], 403);
        }
    }
}
