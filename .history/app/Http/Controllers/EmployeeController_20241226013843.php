<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Jobtitle;
use App\Models\Category;
use App\Models\Nationality;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Document;
use App\Models\Employee;
use App\Models\EmployeeDocument;
use App\Models\AttendanceEmployee;
use App\Models\EmployeeContracts;
use App\Models\EmployeeFollower;
use App\Models\Qualification;
use App\Models\AllowanceOption;
use App\Models\Allowance;
use App\Models\Salary_setting;
use App\Models\Holiday;
use App\Models\Absence;
use App\Models\AttendanceMovement;
use App\Mail\UserCreate;
use App\Models\Plan;
use App\Models\User;
use App\Models\Employee_shift;
use App\Models\Jobtype;
use App\Models\Laborhirecompany;
use App\Models\Workunit;
use App\Models\Bank;
use App\Models\Utility;
use App\Models\Asset;
use App\Models\DucumentUpload;
use App\Models\Leave;
use App\Models\Place;
use App\Models\EmployeeRequest;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Imports\EmployeesImport;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Role;

//use Faker\Provider\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(\Auth::user()->can('Manage Employee')) {
            if (Auth::user()->type == 'employee') {

                $data['employees'] = Employee::where('user_id', '=', Auth::user()->id)->get();
                $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
                $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
                $data['new_join'] = Employee::whereBetween('Join_date_gregorian', [$lastMonthStart, $lastMonthEnd])->count();

            } else {
                $data['employees'] = Employee::where('created_by', \Auth::user()->creatorId())->get();
                $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
                $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
                $data['new_join'] = Employee::whereBetween('Join_date_gregorian', [$lastMonthStart, $lastMonthEnd])->count();

            }

            return view('dashboard.Employee.index', $data);
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Employee')) {
            $lang = app()->getLocale() == 'ar' ? '_ar' : '';
            $company_settings = Utility::settings();
            $documents        = Document::where('created_by', \Auth::user()->creatorId())->get();
            $branches         = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $departments      = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $designations     = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $employees        = Employee::where('created_by', \Auth::user()->creatorId())->pluck('name'.$lang, 'id');
            $employeesId      = \Auth::user()->employeeIdFormat($this->employeeNumber());

            $jobtitles         = Jobtitle::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $categories        = Category::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $nationalities     = Nationality::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');

            // $attandance_employees     = Http::get('https://attendance.our2030vision.com/employees');
            // $attandance_employees     = $attandance_employees['data'];

            $attandance_employees        = [];
            $laborCompanies              = Laborhirecompany::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $work_units                  = Workunit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $job_types                   = Jobtype::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $jobclasses                  = ['1','2'];
            $roles                       = Role::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $allowance_options           = AllowanceOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $banks                       = Bank::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $employee_shifts             = Employee_shift::where('created_by', \Auth::user()->creatorId())->get();
            $employee_location           = Place::where('created_by', \Auth::user()->creatorId())->get();

            return view('employee.create', compact('employees','lang','roles','allowance_options','employee_shifts','banks','laborCompanies','jobclasses','job_types','work_units','employeesId', 'departments', 'designations', 'documents', 'branches', 'company_settings','jobtitles','categories','nationalities','attandance_employees','employee_location'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request)
    {

        if(\Auth::user()->can('Create Employee')) {
            $validator = \Validator::make(
            $request->all(),
            [
                'name'           => 'required|string|max:255',
                'name_ar'        => 'required|string|max:255',
                'email'          => 'required|email|unique:users,email',
                'password'       => 'required|string|min:8|confirmed',
                'phone'          => 'required|numeric',
                'user_register'  => 'required|boolean',
                'document.*'     => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf,doc,zip|max:20480',
            ]
        );
            if ($validator->fails()) {

                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $objUser        = User::find(\Auth::user()->creatorId());
            $total_employee = $objUser->countEmployees();
            $plan           = Plan::find($objUser->plan);
            if($total_employee < $plan->max_employees || $plan->max_employees == -1) {
                $user = User::create([
                    'name'         => $request['name'],
                    'email'        => $request['email'],
                    'password'     => Hash::make($request['password']),
                    'type'         => 'employee',
                    'lang'         => 'en',
                    'user_status'  => $request->user_register,
                    'created_by'   => \Auth::user()->creatorId(),
                ]);

                $user->save();
                $user->assignRole('Employee');
            } else {
                return redirect()->back()->with('error', __('Your employee limit is over, Please upgrade plan.'));
            }

            if(!empty($request->document) && !is_null($request->document)) {
                $document_implode = implode(',', array_keys($request->document));
            } else {
                $document_implode = null;
            }

            $data                        = $request->all();
            $data['nationality_id']      = $request['nationality_type'] == 0 ? $request['nationality_id'] : null;
            $data['user_id']             = $user->id;
            $data['password']            = Hash::make($request['password']);
            $data['employee_id']         = $this->employeeNumber();
            $data['created_by']          = \Auth::user()->creatorId();
            $employee                    = Employee::create($data);

            if($request->hasFile('iqama_attachment'))
            {
                $filenameWithExt = $request->file('iqama_attachment')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('iqama_attachment')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/document/');
                $image_path      = $dir . $filenameWithExt;

                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('iqama_attachment')->storeAs('uploads/document/', $fileNameToStore);
                $data['iqama_attachment'] = $fileNameToStore;
            }

            if($request->hasFile('passport_attachment'))
            {
                $filenameWithExt = $request->file('passport_attachment')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('passport_attachment')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/document/');
                $image_path      = $dir . $filenameWithExt;

                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('passport_attachment')->storeAs('uploads/document/', $fileNameToStore);
                $data['passport_attachment'] = $fileNameToStore;
            }

            if($request->hasFile('insurance_document'))
            {
                $filenameWithExt = $request->file('insurance_document')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('insurance_document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/document/');
                $image_path      = $dir . $filenameWithExt;

                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('insurance_document')->storeAs('uploads/document/', $fileNameToStore);
                $data['insurance_document'] = $fileNameToStore;
            }

            $employeeContract = EmployeeContracts::create([
                'contract_type'             => $request->contract_type,
                'contract_duration'         => $request->contract_duration,
                'employee_id'               => $employee->id,
                'contract_startdate'        => $request->contract_startdate,
                'contract_startdate_Hijri'  => $request->contract_startdate_Hijri,
                'contract_enddate'          => $request->contract_enddate,
                'contract_enddate_Hijri'    => $request->contract_enddate_Hijri,
            ]);

            if($request->allowance_option)
            {
                foreach($request->allowance_option as $key => $allowance)
                {
                    allowance::create([
                        'employee_id'      => $employee->id,
                        'allowance_option' => $allowance,
                        'title'            => '00',
                        'amount'           => ($request->amount)[$key],
                        'created_by'       => \Auth::user()->creatorId(),
                    ]);
                }
            }

            $setings = Utility::settings();
            if ($setings['employee_create'] == 1) {
                $user->type     = 'Employee';
                $user->password = $request['password'];
                try {
                    Mail::to($user->email)->send(new UserCreate($user));
                } catch (\Exception $e) {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }

                return redirect()->route('employee.index')->with('success', __('Employee successfully created.') . (isset($smtp_error) ? $smtp_error : ''));
            }

            return redirect()->route('employee.index')->with('success', __('Employee  successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        if(\Auth::user()->can('Edit Employee')) {

            $documents    = Document::where('created_by', \Auth::user()->creatorId())->get();
            $branches     = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments  = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employee     = Employee::find($id);
            $employeesId  = \Auth::user()->employeeIdFormat($employee->employee_id);

            $jobtitles         = Jobtitle::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $categories        = Category::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $nationalities     = Nationality::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employeeContract  = EmployeeContracts::where('employee_id',$id)->first();

            $attandance_employees     = Http::get('https://attendance.our2030vision.com/employees');
            $attandance_employees     = $attandance_employees['data'];

            $employee_shifts          = Employee_shift::where('created_by', \Auth::user()->creatorId())->get();
            $employee_location        = Place::where('created_by', \Auth::user()->creatorId())->get();

            return view('employee.edit', compact('employee','employeeContract', 'employeesId', 'branches', 'departments', 'designations', 'documents','jobtitles','categories','nationalities','attandance_employees','employee_shifts','employee_location'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function update(Request $request, $id)
    {
        if (\Auth::user()->can('Edit Employee')) {

            if($request->has('update_organization_info'))
            {
                $employee     = Employee::findOrFail($id);
                $input        = $request->all();
                $employee->fill($input)->save();
                return redirect()->route('employee.index')->with('success', 'Employee successfully updated.');
            }


            if($request->has('update_probationDuration'))
            {
                $employee                               = Employee::findOrFail($id);
                $employee->employee_on_probation        = 1;
                $employee->probation_periods_duration   = $request->probation_periods_duration;
                $employee->save();
                return back()->with('success', 'successfully updated.');
            }

            if($request->has('update_financial_info'))
            {
                $employee     = Employee::findOrFail($id);
                $input        = $request->all();
                $employee->fill($input)->save();
                return back()->with('success', 'successfully updated.');
            }


            $validator = \Validator::make(
            $request->all(),
            [
                'name'           => 'required',
                'name_ar'        => 'required',
                'email'          => 'required|unique:employees,email,'.$id,
                'phone'          => 'required|unique:employees,phone,'.$id,
                'document.*'     => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc,zip|max:20480',
            ]);

            if($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $employee = Employee::findOrFail($id);

            if($request->document) {
                foreach ($request->document as $key => $document) {
                    if(!empty($document)) {
                        $filenameWithExt = $request->file('document')[$key]->getClientOriginalName();
                        $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension       = $request->file('document')[$key]->getClientOriginalExtension();
                        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                        $dir        = storage_path('uploads/document/');
                        $image_path = $dir . $filenameWithExt;

                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }

                        if (!file_exists($dir)) {
                            mkdir($dir, 0777, true);
                        }
                        $path = $request->file('document')[$key]->storeAs('uploads/document/', $fileNameToStore);


                        $employee_document = EmployeeDocument::where('employee_id', $employee->employee_id)->where('document_id', $key)->first();

                        if(!empty($employee_document)) {
                            $employee_document->document_value = $fileNameToStore;
                            $employee_document->save();
                        } else {
                            $employee_document                 = new EmployeeDocument();
                            $employee_document->employee_id    = $employee->employee_id;
                            $employee_document->document_id    = $key;
                            $employee_document->document_value = $fileNameToStore;
                            $employee_document->save();
                        }
                    }
                }
            }

            $employee                        = Employee::findOrFail($id);
            $input                           = $request->all();

            if($request->hasFile('iqama_attachment'))
            {
                $filenameWithExt = $request->file('iqama_attachment')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('iqama_attachment')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/document/');
                $image_path      = $dir . $filenameWithExt;

                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('iqama_attachment')->storeAs('uploads/document/', $fileNameToStore);
                $data['iqama_attachment'] = $fileNameToStore;
            }

            if($request->hasFile('passport_attachment'))
            {
                $filenameWithExt = $request->file('passport_attachment')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('passport_attachment')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/document/');
                $image_path      = $dir . $filenameWithExt;

                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('passport_attachment')->storeAs('uploads/document/', $fileNameToStore);
                $data['passport_attachment'] = $fileNameToStore;
            }

            if($request->hasFile('insurance_document'))
            {
                $filenameWithExt = $request->file('insurance_document')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('insurance_document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/document/');
                $image_path      = $dir . $filenameWithExt;

                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('insurance_document')->storeAs('uploads/document/', $fileNameToStore);
                $data['insurance_document'] = $fileNameToStore;
            }

            if($request->user_register)
            {
                $employee_user = User::where('id',$employee->user_id)->first();

                if(!$employee_user)
                {
                    $user = User::create([
                        'name'         => $request['name'],
                        'email'        => $request['email'],
                        'password'     => Hash::make($request['password']),
                        'type'         => 'employee',
                        'lang'         => 'en',
                        'user_status'  => $request->user_register,
                        'created_by'   => \Auth::user()->creatorId(),
                    ]);

                    $user->save();
                    $user->assignRole('Employee');
                }else{
                    $employee_user->user_status = $request->user_register;
                    if($request->password)
                    {
                        $employee_user->password    = Hash::make($request['password']);
                    }
                    $employee_user->save();
                }

                $input['user_id']                = $employee_user ? $employee_user->id : $user->id;
                if($request->password)
                {
                    $input['password']    = Hash::make($request['password']);
                }
            }

            $input['nationality_id']         = $request['nationality_type'] == 0 ? $request['nationality_id'] : null;
            $input['driving_license_number'] = $request['driving_license'] == 1 ? $request['driving_license_number'] : null;
            $input['expiry_date']            = $request['driving_license'] == 1 ? $request['expiry_date'] : null;

            $employee->fill($input)->save();

            // $employeeContract = EmployeeContracts::where('employee_id',$id)->first();

            // if($employeeContract)
            // {
            //     $data                     = $request->all();
            //     $data['employee_id']      = $employee->id;
            //     $data['contract_enddate'] = $request->contract_type == 0 ? null : $request->contract_enddate;

            //     $data['insurance_startdate'] = $request->medical_insurance == 1 ? $request->insurance_startdate : null;
            //     $data['insurance_enddate']   = $request->medical_insurance == 1 ? $request->insurance_enddate : null;

            //     $data['worker_startdate'] = $request->worker == 1 ? $request->worker_enddate : null;
            //     $data['worker_enddate']   = $request->worker == 1 ? $request->worker_enddate : null;

            //     if($request->hasFile('contract_document'))
            //     {
            //         $filenameWithExt = $request->file('contract_document')->getClientOriginalName();
            //         $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //         $extension       = $request->file('contract_document')->getClientOriginalExtension();
            //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //         $dir             = storage_path('uploads/document/');
            //         $image_path      = $dir . $employeeContract['contract_document'];

            //         if(File::exists($image_path))
            //         {
            //             File::delete($image_path);
            //         }

            //         if(!file_exists($dir))
            //         {
            //             mkdir($dir, 0777, true);
            //         }
            //         $path = $request->file('contract_document')->storeAs('uploads/document/', $fileNameToStore);
            //         $data['contract_document'] = $fileNameToStore;
            //     }

            //     if($request->hasFile('insurance_document'))
            //     {
            //         $filenameWithExt2 = $request->file('insurance_document')->getClientOriginalName();
            //         $filename2        = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            //         $extension2       = $request->file('insurance_document')->getClientOriginalExtension();
            //         $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
            //         $dir2             = storage_path('uploads/document/');
            //         $image_path2      = $dir2 . $employeeContract['insurance_document'];

            //         if(File::exists($image_path2))
            //         {
            //             File::delete($image_path2);
            //         }

            //         if(!file_exists($dir2))
            //         {
            //             mkdir($dir2, 0777, true);
            //         }
            //         $path2 = $request->file('insurance_document')->storeAs('uploads/document/', $fileNameToStore2);
            //         $data['insurance_document'] = $fileNameToStore2;
            //     }

            //     if($request->hasFile('worker_document'))
            //     {
            //         $filenameWithExt3 = $request->file('worker_document')->getClientOriginalName();
            //         $filename3         = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            //         $extension3        = $request->file('worker_document')->getClientOriginalExtension();
            //         $fileNameToStore3  = $filename3 . '_' . time() . '.' . $extension3;
            //         $dir3              = storage_path('uploads/document/');
            //         $image_path3       = $dir3 . $employeeContract['worker_document'];

            //         if(File::exists($image_path3))
            //         {
            //             File::delete($image_path3);
            //         }

            //         if(!file_exists($dir3))
            //         {
            //             mkdir($dir3, 0777, true);
            //         }
            //         $path3 = $request->file('worker_document')->storeAs('uploads/document/', $fileNameToStore3);
            //         $data['worker_document'] = $fileNameToStore3;
            //     }

            //     $employeeContract->fill($data)->save();
            // }

            if($request->salary) {
                return redirect()->route('setsalary.index')->with('success', 'Employee successfully updated.');
            }

            if(\Auth::user()->type != 'employee') {
                return redirect()->route('employee.index')->with('success', 'Employee successfully updated.');
            } else {
                return redirect()->route('employee.show', \Illuminate\Support\Facades\Crypt::encrypt($employee->id))->with('success', 'Employee successfully updated.');
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Request $request , $id)
    {
        if (Auth::user()->can('Delete Employee')) {

            if($request->has('delete-duration'))
            {
                $employee                               = Employee::findOrFail($id);
                $employee->employee_on_probation        = null;
                $employee->probation_periods_status     = null;
                $employee->probation_periods_duration   = null;
                $employee->save();
                return back()->with('success', 'successfully updated.');
            }

            if($request->has('finish_probationDuration'))
            {
                $employee                               = Employee::findOrFail($id);
                $created                                = Carbon::parse($employee->Join_date_gregorian);
                $now                                    = Carbon::now();
                $employee->probation_periods_status     = 1;
                $employee->probation_periods_duration   = $created->diff($now)->days;
                $employee->save();
                return back()->with('success', 'successfully updated.');
            }

            $employee      = Employee::findOrFail($id);
            $user          = User::where('id', '=', $employee->user_id)->first();

            $emp_documents = EmployeeDocument::where('employee_id', $employee->employee_id)->get();
            $employee->delete();
            $user ? $user->delete() : '';

            $dir = storage_path('uploads/document/');
            foreach ($emp_documents as $emp_document) {
                $emp_document->delete();
                if (!empty($emp_document->document_value)) {
                    unlink($dir . $emp_document->document_value);
                }
            }

            return redirect()->route('employee.index')->with('success', 'Employee successfully deleted.');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show($id)
    {
        if(\Auth::user()->can('Show Employee'))
        {
            $lang                    = app()->getLocale() == 'ar' ? '_ar' : '';
            $empId                   = Crypt::decrypt($id);
            $documents               = Document::where('created_by', \Auth::user()->creatorId())->get();
            $branches                = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $departments             = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $designations            = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $employee                = Employee::find($empId);
            $employees               = Employee::where('created_by', \Auth::user()->creatorId())->pluck('name'.$lang, 'id');
            $employeesId             = \Auth::user()->employeeIdFormat($employee->employee_id);
            $employeeContract        = EmployeeContracts::where('employee_id',$empId)->first();
            $employeeFollowers       = EmployeeFollower::where('employee_id',$empId)->get();
            $qualifications          = Qualification::where('employee_id',$empId)->get();

            //$httpResponse          =  Http::get('https://attendance.our2030vision.com/api/v1/employee/tracking/'.$employee->sync_attendance_employee_id)->json();
            $httpResponse            = [];
            $employee_tracking_dates = $httpResponse ? $httpResponse : [];
            $attandance_employees    = [];
            $jobtitles               = Jobtitle::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $categories              = Category::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $nationalities           = Nationality::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $laborCompanies          = Laborhirecompany::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $work_units              = Workunit::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $job_types               = Jobtype::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $jobclasses              = ['1','2'];
            $roles                   = Role::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $allowance_options       = AllowanceOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $banks                   = Bank::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $employee_shifts         = Employee_shift::where('created_by', \Auth::user()->creatorId())->get();
            $assets                  = Asset::where('employee_id',$empId)->get();
            $documents               = DucumentUpload::where('employee_id',$empId)->get();
            $leaves                  = EmployeeRequest::where('employee_id', '=', $employee->id)->get();
            $employees               = Employee::select('id', 'name')->where('id',$empId)->where('created_by', \Auth::user()->creatorId())->pluck('name', 'id');

            if(!empty($request->month))
            {
                $currentdate = strtotime($request->month);
                $month       = date('m', $currentdate);
                $year        = date('Y', $currentdate);
                $curMonth    = date('M-Y', strtotime($request->month));
            }
            else
            {
                $month    = date('m');
                $year     = date('Y');
                $curMonth = date('M-Y', strtotime($year . '-' . $month));
            }


            $attendanceStatus   = [];
            $dates              = [];
            $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();

            if($attendancemovement)
            {
                $carbonday            = \Carbon\Carbon::parse($attendancemovement->start_movement_date)->format('d');
                $carbonmonth          = \Carbon\Carbon::parse($attendancemovement->start_movement_date)->format('m');
                $carbonyear           = \Carbon\Carbon::parse($attendancemovement->start_movement_date)->format('Y');

                $begin_of_month = now()->setDay($carbonday)->setMonth($carbonmonth)->setYear($carbonyear);
                $end_of_month   = $begin_of_month->clone()->addMonthNoOverflow()->subDay();

                for($i = $begin_of_month; $i <= ($end_of_month);  $i->addDay()){
                    $dates[] = $i->format('Y').'/'.$i->format('m').'/'.$i->format('d');
                }

            }

            $employeesAttendance = [];
            $totalPresent        = $totalLeave = $totalEarlyLeave = $totalVacation = $totalSick = $totalX = 0;
            $ovetimeHours        = $overtimeMins = $earlyleaveHours = $earlyleaveMins = $lateHours = $lateMins = 0;

            foreach($employees as $id => $employeee)
            {
                $attendances['id']   = $id;
                $attendances['name'] = $employeee;

                foreach($dates as $date)
                {
                    $dt                 = Carbon::parse($date);
                    $employeeAttendance = AttendanceEmployee::where('employee_id', $id)->where('date', $date)->first();

                    if(!empty($employeeAttendance) && $employeeAttendance->status == 'Present')
                    {
                        $attendanceStatus[$date.'-'.$dt->format('l')] = 'P';
                        $totalPresent            += 1;

                        if($employeeAttendance->overtime > 0)
                        {
                            $ovetimeHours += date('h', strtotime($employeeAttendance->overtime));
                            $overtimeMins += date('i', strtotime($employeeAttendance->overtime));
                        }

                        if($employeeAttendance->early_leaving > 0)
                        {
                            $earlyleaveHours += date('h', strtotime($employeeAttendance->early_leaving));
                            $earlyleaveMins  += date('i', strtotime($employeeAttendance->early_leaving));
                        }

                        if($employeeAttendance->late > 0)
                        {
                            $lateHours += date('h', strtotime($employeeAttendance->late));
                            $lateMins  += date('i', strtotime($employeeAttendance->late));
                        }
                    }
                    else
                    {
                        $attendanceStatus[$date.'-'.$dt->format('l')] = '';
                    }
                }

                $absences        = $attendancemovement ?  Absence::where('employee_id', $id)->whereBetween('start_date',[$attendancemovement->start_movement_date , $attendancemovement->end_movement_date])->get() : [];
                $absenceStatus   = [];

                if($absences)
                {
                    foreach($absences as $absence)
                    {
                        $datesArr      = [];
                        for($i = 1 ; $i <= $absence->number_of_days ; $i++)
                        {
                            $startDate           = Carbon::parse($absence->start_date);
                            array_push($datesArr,$startDate->addDays($i)->subDays(1)->format('Y/m/d'));

                            foreach($datesArr as $singleDate)
                            {
                                $singledt     = Carbon::parse($singleDate);
                                if($absence->type == 'A')
                                {
                                    $absenceStatus[$singleDate.'-'.$singledt->format('l')] = 'A';
                                    $totalLeave              += 1;
                                }elseif($absence->type == 'V'){
                                    $absenceStatus[$singleDate.'-'.$singledt->format('l')] = 'V';
                                    $totalVacation              += 1;
                                }elseif($absence->type == 'S'){
                                    $absenceStatus[$singleDate.'-'.$singledt->format('l')] = 'S';
                                    $totalSick              += 1;
                                }elseif($absence->type == 'X'){
                                    $absenceStatus[$singleDate.'-'.$singledt->format('l')] = 'X';
                                    $totalX              += 1;
                                }
                            }
                        }
                    }
                }

                $attendances['status'] = array_merge($attendanceStatus , $absenceStatus) ?? [];
                $employeesAttendance[] = $attendances;
            }

            $totalOverTime   = $ovetimeHours + ($overtimeMins / 60);
            $totalEarlyleave = $earlyleaveHours + ($earlyleaveMins / 60);
            $totalLate       = $lateHours + ($lateMins / 60);

            $data['totalOvertime']   = $totalOverTime;
            $data['totalEarlyLeave'] = $totalEarlyleave;
            $data['totalLate']       = $totalLate;
            $data['totalPresent']    = $totalPresent;
            $data['totalLeave']      = $totalLeave;
            $data['curMonth']        = $curMonth;

            $setting   = Salary_setting::where('created_by',\Auth::user()->creatorId())->first() ?? [];
            $holidays  = Holiday::where('created_by',\Auth::user()->creatorId())->pluck('date')->toarray();

            $employee_shifts             = Employee_shift::where('created_by', \Auth::user()->creatorId())->get();
            $employee_location           = Place::where('created_by', \Auth::user()->creatorId())->get();

            return view('employee.show', compact('employee','lang','setting','holidays','employees','assets','documents','employeesAttendance','dates', 'data',
            'leaves','employee_shifts','banks','allowance_options','roles','jobclasses','job_types','work_units','laborCompanies','qualifications',
            'jobtitles','nationalities','categories','attandance_employees','employeeContract','employeeFollowers','employeesId', 'branches', 'departments', 'designations',
            'documents','employee_tracking_dates','employee_shifts','employee_location'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    function employeeNumber()
    {
        $latest = Employee::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if (!$latest) {
            return 1;
        }

        return $latest->id + 1;
    }

    public function export()
    {
        $name = 'employee_' . date('Y-m-d i:h:s');
        $data = Excel::download(new EmployeesExport(), $name . '.xlsx');
        if(ob_get_contents()) ob_end_clean();

        return $data;
    }

    public function importFile()
    {
        return view('employee.import');
    }

    public function import(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:csv,txt',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $employees = (new EmployeesImport())->toArray(request()->file('file'))[0];
        $totalCustomer = count($employees) - 1;
        $errorArray    = [];

        for ($i = 1; $i <= count($employees) - 1; $i++) {

            $employee = $employees[$i];
            $employeeByEmail = Employee::where('email', $employee[5])->first();
            $userByEmail = User::where('email', $employee[5])->first();
            // dd($userByEmail);

            if (!empty($employeeByEmail) && !empty($userByEmail)) {

                $employeeData = $employeeByEmail;
            } else {


                $user = new User();
                $user->name = $employee[0];
                $user->email = $employee[5];
                $user->password = Hash::make($employee[6]);
                $user->type = 'employee';
                $user->lang = 'en';
                $user->created_by = \Auth::user()->creatorId();
                $user->save();
                $user->assignRole('Employee');

                $employeeData = new Employee();
                $employeeData->employee_id      = $this->employeeNumber();
                $employeeData->user_id             = $user->id;
            }


            $employeeData->name                = $employee[0];
            $employeeData->dob                 = $employee[1];
            $employeeData->gender              = $employee[2];
            $employeeData->phone               = $employee[3];
            $employeeData->address             = $employee[4];
            $employeeData->email               = $employee[5];
            $employeeData->password            = Hash::make($employee[6]);
            $employeeData->branch_id           = $employee[8];
            $employeeData->department_id       = $employee[9];
            $employeeData->designation_id      = $employee[10];
            $employeeData->company_doj         = $employee[11];
            $employeeData->account_holder_name = $employee[12];
            $employeeData->account_number      = $employee[13];
            $employeeData->bank_name           = $employee[14];
            $employeeData->bank_identifier_code = $employee[15];
            $employeeData->branch_location     = $employee[16];
            $employeeData->tax_payer_id        = $employee[17];
            $employeeData->created_by          = \Auth::user()->creatorId();

            if (empty($employeeData)) {

                $errorArray[] = $employeeData;
            } else {

                $employeeData->save();
            }
        }

        $errorRecord = [];

        if (empty($errorArray)) {
            $data['status'] = 'success';
            $data['msg']    = __('Record successfully imported');
        } else {
            $data['status'] = 'error';
            $data['msg']    = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalCustomer . ' ' . 'record');


            foreach ($errorArray as $errorData) {

                $errorRecord[] = implode(',', $errorData);
            }

            \Session::put('errorArray', $errorRecord);
        }

        return redirect()->back()->with($data['status'], $data['msg']);
    }

    public function json(Request $request)
    {
        $designations = Designation::where('department_id', $request->department_id)->get()->pluck('name', 'id')->toArray();

        return response()->json($designations);
    }

    public function profile(Request $request)
    {
        if(\Auth::user()->can('Manage Employee Profile')) {
            $employees = Employee::where('created_by', \Auth::user()->creatorId());
            if (!empty($request->branch)) {
                $employees->where('branch_id', $request->branch);
            }
            if (!empty($request->department)) {
                $employees->where('department_id', $request->department);
            }
            if (!empty($request->designation)) {
                $employees->where('designation_id', $request->designation);
            }
            $employees = $employees->get();

            $brances = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $brances->prepend('All', '');

            $departments = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments->prepend('All', '');

            $designations = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations->prepend('All', '');

            return view('employee.profile', compact('employees', 'departments', 'designations', 'brances'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function profileShow($id)
    {
        if (\Auth::user()->can('Show Employee Profile')) {
            $empId        = Crypt::decrypt($id);
            $documents    = Document::where('created_by', \Auth::user()->creatorId())->get();
            $branches     = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $departments  = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $designations = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employee     = Employee::find($empId);
            $employeesId  = \Auth::user()->employeeIdFormat($employee->employee_id);
            $attandance_employees = [];

            return view('employee.show1', compact('employee', 'employeesId', 'attandance_employees','branches', 'departments', 'designations', 'documents'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function lastLogin()
    {
        $users = User::where('created_by', \Auth::user()->creatorId())->get();

        return view('employee.lastLogin', compact('users'));
    }

    public function employeeJson(Request $request)
    {
        $employees = Employee::where('branch_id', $request->branch)->get()->pluck('name', 'id')->toArray();

        return response()->json($employees);
    }

    public function showtracking($id,$date)
    {
        $employee_tracks = Http::get('https://attendance.our2030vision.com/api/v1/employee/showtracking/'.$id.'/'.$date.'')->json();
        return view('employee.showtracking', compact('employee_tracks'));
    }

    public function addprobation_periods(Request $request, $id)
    {
        $Employeeinfo = Employee::find($id);
        if(\Auth::user()->can('Edit Employee'))
        {
            if($Employeeinfo->created_by == \Auth::user()->creatorId())
            {
                return view('probationperiods.edit', compact('Employeeinfo'));
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
}
