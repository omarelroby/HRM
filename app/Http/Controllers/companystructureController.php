<?php

namespace App\Http\Controllers;

use App\Models\CompanyStructure;
use App\Models\CompanyStructureEmployee;
use App\Http\Resources\CompanyStructureResource;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Section;
use App\Models\SubDepartment;
use Illuminate\Http\Request;

class companystructureController extends Controller
{
    public function index()
    {
        $lang = app()->getLocale() == 'ar' ? '_ar' : '';
        $userCreatorId = \Auth::user()->creatorId();

        // Fetch departments, sub-departments, sections, and designations
        $departments = Department::where('created_by', $userCreatorId)->get();
        $subDepartments = SubDepartment::where('created_by', $userCreatorId)->get();
        $sections = Section::where('created_by', $userCreatorId)->get();
        $designations = Designation::where('created_by', $userCreatorId)->get();

        // Fetch employees grouped by department, sub-department, section, and designation
        $employees = Employee::where('created_by', $userCreatorId)
            ->with(['departments', 'sub_dep', 'section', 'designation'])
            ->get()
            ->groupBy(['department_id', 'sub_dep_id', 'section_id', 'designation_id']);


        $structureTree = $this->buildStructureTree($departments, $subDepartments, $sections, $designations, $employees, $lang);
//        dd($structureTree);
        return view('dashboard.companystructures.main', compact('structureTree', 'lang', 'employees'));
    }

    private function buildStructureTree($departments, $subDepartments, $sections, $designations, $employees, $lang)
    {
        $tree = [];

        foreach ($departments as $department) {
            $departmentNode = [
                'id' => 'dept-' . $department->id,
                'name' => $department->{'name' . $lang},
                'title' => 'Department',
                'children' => [],
            ];

            // Add department managers (employees with sub_dep_id = 0)
            if (isset($employees[$department->id][0])) {
                foreach ($employees[$department->id][0] as $sectionGroup) {
                    foreach ($sectionGroup as $designationGroup) {
                        foreach ($designationGroup as $employee) {
                            $departmentNode['children'][] = [
                                'id' => 'emp-' . $employee->id,
                                'name' => $employee->name,
                                'title' => $employee->position . ' - ' . $department->{'name' . $lang} . ' Manager',
                            ];
                        }
                    }
                }
            }

            // Add sub-departments
            foreach ($subDepartments->where('department_id', $department->id) as $subDepartment) {
                $subDepartmentNode = [
                    'id' => 'subdept-' . $subDepartment->id,
                    'name' => $subDepartment->{'name' . $lang},
                    'title' => 'Sub-Department',
                    'children' => [],
                ];

                // Add sub-department managers (employees with sub_dep_id = current sub-department and section_id = 0)
                if (isset($employees[$department->id][$subDepartment->id][0])) {
                    foreach ($employees[$department->id][$subDepartment->id][0] as $designationGroup) {
                        foreach ($designationGroup as $employee) {
                            $subDepartmentNode['children'][] = [
                                'id' => 'emp-' . $employee->id,
                                'name' => $employee->name,
                                'title' => $employee->position . ' - ' . $subDepartment->{'name' . $lang} . ' Manager',
                            ];
                        }
                    }
                }

                // Add sections as children of the sub-department
                foreach ($sections->where('sub_dep_id', $subDepartment->id) as $section) {
                    $sectionNode = [
                        'id' => 'section-' . $section->id,
                        'name' => $section->{'name' . $lang},
                        'title' => 'Section',
                        'children' => [],
                    ];

                    // Add designations under the section
                    foreach ($designations->where('section_id', $section->id) as $designation) {
                        $designationNode = [
                            'id' => 'designation-' . $designation->id,
                            'name' => $designation->{'name' . $lang},
                            'title' => 'Designation: ' . $designation->{'name' . $lang},
                            'children' => [],
                        ];

                        // Add employees under the designation
                        if (isset($employees[$department->id][$subDepartment->id][$section->id][$designation->id])) {
                            foreach ($employees[$department->id][$subDepartment->id][$section->id][$designation->id] as $employee) {
                                $designationNode['children'][] = [
                                    'id' => 'emp-' . $employee->id,
                                    'name' => $employee->name,
                                    'title' => $employee->job_title,
                                ];
                            }
                        }

                        // Add the designation node to the section
                        $sectionNode['children'][] = $designationNode;
                    }

                    // Add the section node to the sub-department
                    $subDepartmentNode['children'][] = $sectionNode;
                }

                // Add the sub-department node to the department
                $departmentNode['children'][] = $subDepartmentNode;
            }

            // Add the department node to the tree
            $tree[] = $departmentNode;
        }

        return $tree;
    }
    public function index2($id)
    {
        if(\Auth::user()->can('Manage Branch'))
        {
            $segment           = null;
            $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
            $parentTree        = CompanyStructure::where('id',$id)->first();
            $structure_tree    = CompanyStructure::with('parent')
                ->where('parent',$id)
                ->where('created_by', '=', \Auth::user()->creatorId())
                ->get();        // to get child and parents.
            $CompanyStructures = CompanyStructureResource::collection($structure_tree);
            $employee_in_comp_structure   = CompanyStructure::
                  whereNotNull('parent')
                ->where('created_by', '=', \Auth::user()->creatorId())
                ->pluck('employee_id')
                ->toArray();
            $employees         = Employee::where('created_by', \Auth::user()->creatorId())
                ->whereNotIn('id',$employee_in_comp_structure)
                ->get()
                ->pluck('name', 'id');
            if(count($employee_in_comp_structure) > 0)
            {
                $employees = Employee::where('created_by', \Auth::user()->creatorId())
                    ->whereNotIn('id',$employee_in_comp_structure)
                    ->get()
                    ->pluck('name', 'id');
                if(count($employee_in_comp_structure)==1)
                {
                    $structure_tree    = CompanyStructure::
                          where('parent',0)
                        ->where('created_by', '=', \Auth::user()->creatorId())
                        ->get()
                         ->pluck('name', 'id');
                }
                else{
                    if(count($employee_in_comp_structure)>1)
                    {
                        $all_comp_struct=CompanyStructure::pluck('id')->toArray();
                        $structure_tree    = CompanyStructure::
                            whereIn('id',$all_comp_struct)
                             ->where('created_by', '=', \Auth::user()->creatorId())
                            ->get()
                            ->pluck('name', 'id');
                    }
                    else{
                        $structure_tree    = CompanyStructure::
                        where('parent',$id)
                            ->where('created_by', '=', \Auth::user()->creatorId())
                            ->get()
                            ->pluck('name', 'id');
                    }


                }



            }
            else{
                $employees         = Employee::where('created_by', \Auth::user()->creatorId())
                    ->get()
                    ->pluck('name', 'id');

            }


             return view('dashboard.companystructures.index2', compact('structure_tree','id','employees','parentTree','CompanyStructures','segment','lang'));

        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }



    public function create(Request $request)
    {
        if(\Auth::user()->can('Create Branch'))
        {
            $id                = $request->id;
            $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
            $employees         = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            return view('companystructures.create',compact('lang','id','employees'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
//        dd($request->all());
        if(\Auth::user()->can('Create Branch'))
        {
            $validator = \Validator::make(
            $request->all(),
            [
                'name'        => 'required',
                'name_ar'     => 'required',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $companystructure                = new CompanyStructure();
            $companystructure->name          = $request->name;
            $companystructure->name_ar       = $request->name_ar;
            $companystructure->employee_id        = $request->employee_id??null;
            if($request->filled('parent'))
            {
                $companystructure->parent        = $request->parent  ;

            }
            else{
                $companystructure->parent        = 0  ;
            }
            $companystructure->created_by    = \Auth::user()->creatorId();
            $companystructure->save();
//            dd($companystructure);
            $companystructure->employees()->sync($request->employees);
            return back();

//            return redirect()->route('companystructure.index')->with('success', __('Branch  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(CompanyStructure $companystructure)
    {
        $segment = \Request::segments(1)[1];
        $CompanyStructures = CompanyStructure::where('parent',$companystructure->id)->where('created_by', '=', \Auth::user()->creatorId())->get();
        return view('companystructures.index', compact('CompanyStructures','segment'));
    }

    public function edit(CompanyStructure $companystructure)
    {
        if(\Auth::user()->can('Edit Branch'))
        {
            if($companystructure->created_by == \Auth::user()->creatorId())
            {
                $lang         = app()->getLocale() == 'ar' ? '_ar' : '';
                $employees    = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
                $selectedEmployees = $companystructure->employees->pluck('id')->toArray();
                return view('dashboard.companystructures.edit', compact('lang','companystructure','employees' , 'selectedEmployees'));
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

    public function update(Request $request, CompanyStructure $companystructure)
    {
        if(\Auth::user()->can('Edit Branch'))
        {
            if($companystructure->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'name'        => 'required',
                        'name_ar'     => 'required',
                    ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $companystructure->name          = $request->name;
                $companystructure->name_ar       = $request->name_ar;
                $companystructure->save();

                $companystructure->employees()->sync($request->employees);

                return back();

                //return redirect()->route('companystructure.index')->with('success', __('Branch successfully updated.'));
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

    public function destroy(CompanyStructure $companystructure)
    {
        if(\Auth::user()->can('Delete Branch'))
        {
            if($companystructure->created_by == \Auth::user()->creatorId())
            {
                $companystructure->delete();

                return redirect()->route('companystructure.index')->with('success', __('Branch successfully deleted.'));
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
    public function reset()
    {
//        dd('reset');
        if (\Auth::user()->can('Create Branch')) {
            // Delete all records from the company_structures table
            CompanyStructure::where('created_by', \Auth::user()->creatorId())->delete();

            return redirect()->route('companystructure.index')->with('success', __('All company structures have been reset successfully.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
