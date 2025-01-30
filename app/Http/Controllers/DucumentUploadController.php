<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\departments;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\DucumentUpload;
use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DucumentUploadController extends Controller
{

    public function index(Request $request)
    {
        // Check if the user has permission to manage documents
        if (!\Auth::user()->can('Manage Document')) {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
        if(auth()->user()->type=='company' || auth()->user()->type=='super admin')
        {
            $documents = Document::where('created_by', \Auth::user()->creatorId());

            // Filter by employee_id if provided
            if ($request->has('employee_id') && $request->employee_id) {
                $documents->where('employee_id', $request->employee_id);
            }
            if ($request->has('document_type') && $request->document_type) {
                $documents->where('document_type_id', $request->document_type);
            }

            // Filter by department_id if provided
            if ($request->has('department_id') && $request->department_id) {
                $documents->whereHas('employee', function ($q) use ($request) {
                    $q->where('department_id', $request->department_id);
                });
            }

            // Fetch filtered documents
            $documents = $documents->get();

            // Fetch additional data for the view
            $documentTypes = DocumentType::where('created_by', \Auth::user()->creatorId())->pluck('name', 'id');
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->pluck('name', 'id');
            $departments = Department::where('created_by', \Auth::user()->creatorId())->get();
            $types = DocumentType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('dashboard.documentUpload.index', compact('types','departments', 'documents', 'documentTypes', 'employees'));

        }
        if (auth()->user()->type == 'employee') {
            $user = auth()->user();
            $employee = $user->employee;
            $department = $employee ? Department::find($employee->department_id) : null;

            if ($department) {
                // Initialize variables
                $documents = collect();
                $employees = collect();
                $documentTypes = collect();
                $departments = collect();
                $types = collect();

                // Department Manager (no sub-department)
                if ($employee->sub_dep_id == 0) {
                    $employeesIds = $department->employeess->pluck('id');

                    // Fetch documents for employees in the department
                    $documents = Document::whereIn('employee_id', $employeesIds);

                    // Apply filters based on request
                    if ($request->has('employee_id') && $request->employee_id) {
                        $documents->where('employee_id', $request->employee_id);
                    }

                    if ($request->has('document_type') && $request->document_type) {
                        $documents->where('document_type_id', $request->document_type);
                    }

                    // Filter by department_id if provided
                    if ($request->has('department_id') && $request->department_id) {
                        $documents->whereHas('employee', function ($q) use ($request) {
                            $q->where('department_id', $request->department_id);
                        });
                    }

                    $documents = $documents->get();

                    // Fetch additional data for the view
                    $documentTypes = DocumentType::where('created_by', $user->creatorId())->pluck('name', 'id');
                    $employees = Employee::whereIn('id', $employeesIds)->pluck('name', 'id');
                    $departments = Department::where('created_by', $user->creatorId())->get();
                    $types = DocumentType::where('created_by', $user->creatorId())->pluck('name', 'id');
                }
                // Sub-Department Manager (no section)
                elseif ($employee->section_id == 0) {
                    $employeesIds = Employee::where('sub_dep_id', $employee->sub_dep_id)->pluck('id');

                    // Fetch documents for employees in the sub-department
                    $documents = Document::whereIn('employee_id', $employeesIds);

                    // Apply filters based on request
                    if ($request->has('employee_id') && $request->employee_id) {
                        $documents->where('employee_id', $request->employee_id);
                    }

                    if ($request->has('document_type') && $request->document_type) {
                        $documents->where('document_type_id', $request->document_type);
                    }

                    // Filter by department_id if provided
                    if ($request->has('department_id') && $request->department_id) {
                        $documents->whereHas('employee', function ($q) use ($request) {
                            $q->where('department_id', $request->department_id);
                        });
                    }

                    $documents = $documents->get();

                    // Fetch additional data for the view
                    $documentTypes = DocumentType::where('created_by', $user->creatorId())->pluck('name', 'id');
                    $employees = Employee::whereIn('id', $employeesIds)->pluck('name', 'id');
                    $departments = Department::where('created_by', $user->creatorId())->get();
                    $types = DocumentType::where('created_by', $user->creatorId())->pluck('name', 'id');
                }
                // Regular Employee
                else {
                    // Fetch documents for the logged-in employee
                    $documents = Document::where('employee_id', $employee->id);

                    // Apply filters based on request
                    if ($request->has('employee_id') && $request->employee_id) {
                        $documents->where('employee_id', $request->employee_id);
                    }

                    if ($request->has('document_type') && $request->document_type) {
                        $documents->where('document_type_id', $request->document_type);
                    }

                    // Filter by department_id if provided
                    if ($request->has('department_id') && $request->department_id) {
                        $documents->whereHas('employee', function ($q) use ($request) {
                            $q->where('department_id', $request->department_id);
                        });
                    }

                    $documents = $documents->get();

                    // Fetch additional data for the view
                    $documentTypes = DocumentType::where('created_by', $user->creatorId())->pluck('name', 'id');
                    $employees = Employee::where('id', $employee->id)->pluck('name', 'id');
                    $departments = Department::where('created_by', $user->creatorId())->get();
                    $types = DocumentType::where('created_by', $user->creatorId())->pluck('name', 'id');
                }

                return view('dashboard.documentUpload.index', compact('types', 'departments', 'documents', 'documentTypes', 'employees'));
            }
        }
          }

    public function create(Request $request)
    {
        if(\Auth::user()->can('Create Document'))
        {
            $roles = Role::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $roles->prepend('All', '0');
            $employeeId = $request->employee_id;
            return view('dashboard.documentUpload.create', compact('roles','employeeId'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {

        if(\Auth::user()->can('Create Document'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'employee_id' => 'required',
                                   'document_type_id' => 'required',
                                   'document' => 'mimes:jpeg,png,jpg,svg,pdf,doc,zip|max:20480',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            if(!empty($request->document))
            {
                $filenameWithExt = $request->file('document')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/documentUpload/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('document')->storeAs('uploads/documentUpload/', $fileNameToStore);
            }

            $document              = new Document();
            $document->employee_id = $request->employee_id;
            $document->name        = $request->name;
            $document->document    = !empty($request->document) ? $fileNameToStore : '';
            $document->document_type_id  = $request->document_type_id;
            $document->description = $request->description;
            $document->created_by  = \Auth::user()->creatorId();
            if($request->is_start_end_date=='on')
            {
                $document->is_start_end_date=1;
                $document->start_date=$request->start_date;
                $document->end_date=$request->end_date;
            }
            if($request->is_contract=='on')
            {
                $document->is_contract=1;
                $document->contract_specific=$request->contract_specific;
            }
            $document->save();

            return redirect()->back()->with('success', __('Document successfully uploaded.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show(DucumentUpload $ducumentUpload)
    {
        //
    }


    public function edit($id)
    {

        if(\Auth::user()->can('Edit Document'))
        {

            $document = Document::find($id);
            $documentTypes = DocumentType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employees= Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name','id');

            return view('dashboard.documentUpload.edit', compact('employees','documentTypes', 'document'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('Edit Document'))
        {

            $validator = \Validator::make(
                $request->all(), [
                    'name' => 'required',
                    'employee_id' => 'required',
                    'document_type_id' => 'required',
                    'document' => 'mimes:jpeg,png,jpg,svg,pdf,doc,zip|max:20480',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $document = DucumentUpload::find($id);

            if(!empty($request->document))
            {
                $filenameWithExt = $request->file('document')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/documentUpload/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('document')->storeAs('uploads/documentUpload/', $fileNameToStore);

                if(!empty($document->document))
                {
                    unlink($dir . $document->document);
                }

            }

            $document              = Document::findOrFail($id);
            $document->employee_id = $request->employee_id;
            $document->name        = $request->name;
            if($request->hasFile('document'))
            {
            $document->document    = !empty($request->document) ? $fileNameToStore : '';
            }
            $document->document_type_id  = $request->document_type_id;
            $document->description = $request->description;
            $document->created_by  = \Auth::user()->creatorId();
            if($request->is_start_end_date=='on')
            {
            $document->is_start_end_date=1;
            $document->start_date=$request->start_date;
            $document->end_date=$request->end_date;
            }
            else{
                $document->is_start_end_date=0;
                $document->start_date='';
                $document->end_date='';

            }
            if($request->is_contract=='on')
            {
                $document->is_contract=1;
                $document->contract_specific=$request->contract_specific;
            }
            else
            {
                $document->is_contract=0;
                $document->contract_specific='';

            }
            $document->save();

            return redirect('document-upload')->with('success', __('Document successfully uploaded.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy($id)
    {
        if(\Auth::user()->can('Delete Document'))
        {
            $document = Document::find($id);
            if($document->created_by == \Auth::user()->creatorId())
            {
                $document->delete();

                $dir = storage_path('uploads/documentUpload/');

                if(!empty($document->document))
                {
                    unlink($dir . $document->document);
                }

                return redirect()->back()->with('success', __('Document successfully deleted.'));
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
}
