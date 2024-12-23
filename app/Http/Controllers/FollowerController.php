<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeFollower;
use App\Models\Nationality;
use File;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function index()
    {
        //
    }

    public function FollowerCreate($id)
    {
        $employee          = Employee::find($id);
        $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
        $nationalities     = Nationality::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
        return view('followers.create', compact('employee','nationalities','lang'));
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Employee'))
        {
            $validator = \Validator::make(
                $request->all(),
                [
                    'employee_id'      => 'required',
                    'name'             => 'required',
                    'residence_number' => 'required',
                    'passport_number'  => 'required',
                ]);
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $input                = $request->all();
            $input['created_by']  = \Auth::user()->creatorId();

            if($request->hasFile('follower_documents'))
            {
                $filenameWithExt = $request->file('follower_documents')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('follower_documents')->getClientOriginalExtension();
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
                $path = $request->file('follower_documents')->storeAs('uploads/document/', $fileNameToStore);
                $input['documents'] = $fileNameToStore;
            }

            $EmployeeFollower     = EmployeeFollower::create($input);


            return redirect()->back()->with('success', __('EmployeeFollower  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(EmployeeFollower $EmployeeFollower)
    {
        //
    }

    public function edit($EmployeeFollower)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
            $nationalities     = Nationality::where('created_by', \Auth::user()->creatorId())->get()->pluck('name'.$lang, 'id');
            $EmployeeFollower  = EmployeeFollower::find($EmployeeFollower);
            if($EmployeeFollower->created_by == \Auth::user()->creatorId())
            {
                return view('followers.edit', compact('EmployeeFollower','nationalities','lang'));
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

    public function update(Request $request, $EmployeeFollower)
    {
        $EmployeeFollower = EmployeeFollower::find($EmployeeFollower);
        if(\Auth::user()->can('Edit Employee'))
        {
            if($EmployeeFollower->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'residence_number' => 'required',
                    'passport_number' => 'required',
                ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $input                = $request->all();
                if($request->hasFile('follower_documents'))
                {
                    $filenameWithExt = $request->file('follower_documents')->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension       = $request->file('follower_documents')->getClientOriginalExtension();
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
                    $path = $request->file('follower_documents')->storeAs('uploads/document/', $fileNameToStore);
                    $input['documents'] = $fileNameToStore;
                }
                $EmployeeFollower     = $EmployeeFollower->update($input);

                return redirect()->back()->with('success', __('EmployeeFollower successfully updated.'));
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

    public function destroy(Request $request , $EmployeeFollower)
    {
        $EmployeeFollower = EmployeeFollower::find($EmployeeFollower);
        if($EmployeeFollower->created_by == \Auth::user()->creatorId())
        {
            $EmployeeFollower->delete();
            return redirect()->back()->with('success', __('EmployeeFollower successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
