<?php

namespace App\Http\Controllers;

use App\Models\Salary_setting;
use Illuminate\Http\Request;

class SallerySettingController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Create Set Salary'))
        {
            $setting = Salary_setting::where('created_by',\Auth::user()->creatorId())->first() ?? [];
            $days    = [
                'Saturday'  => __('SAT'),
                'Sunday'    => __('SUN'),
                'Monday'    => __('MON'),
                'Tuesday'   => __('TUE'),
                'Wednesday' => __('WED'),
                'Thursday'  => __('THU'),
                'Friday'    => __('FRI'),
            ];
            return view('dashboard.setsalary.sallery-setting',compact('setting','days'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Set Salary'))
        {
            $input  = $request->only('saudi_company_insurance_percentage','saudi_employee_insurance_percentage',
                    'Nonsaudi_company_insurance_percentage','Nonsaudi_employee_insurance_percentage','saudi_employee_medical_insurance','Nonsaudi_employee_medical_insurance',
                    'saudi_company_medical_insurance','Nonsaudi_company_medical_insurance','work_days','work_hours',
                    'annual_vacations',
                    'sick_absence_discount',
                    'absence_with_permission_discount',
                    'absence_without_permission_discount',
                    'overtime_rate'
                    ,'week_vacations','created_by');

            $input['week_vacations'] = implode(',',$request->week_vacations);
            Salary_setting::updateOrCreate([
                'created_by'  =>  \Auth::user()->creatorId(),
            ],$input);

            return redirect()->back()->with('success', __('successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function show(Request $request)
    {
        //
    }

    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request, Salary_setting $Salary_setting)
    {

    }

    public function destroy(Request $request)
    {
        //
    }
}
