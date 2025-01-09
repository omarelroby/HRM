<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('Manage Job Category'))
        {
            $categories = JobCategory::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('dashboard.jobCategory.index', compact('categories'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create(JobCategory $category)
    {
        return view('jobCategory.create');
        if(\Auth::user()->can('Edit Leave Type'))
        {
            if($category->created_by == \Auth::user()->creatorId())
            {

                return view('dashboard.leavetype.edit', compact('category'));
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


    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Job Category'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'title' => 'required',
                                   'title_ar' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $jobCategory             = new JobCategory();
            $jobCategory->title      = $request->title;
            $jobCategory->title_ar      = $request->title_ar;
            $jobCategory->created_by = \Auth::user()->creatorId();
            $jobCategory->save();

            return redirect()->back()->with('success', __('Job category  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(JobCategory $jobCategory)
    {
        //
    }


    public function edit(JobCategory $jobCategory)
    {
        return view('dashboard.jobCategory.edit', compact('jobCategory'));
    }


    public function update(Request $request, JobCategory $jobCategory)
    {
        if(\Auth::user()->can('Edit Job Category'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'title' => 'required',
                                   'title_ar' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $jobCategory->title = $request->title;
            $jobCategory->title_ar = $request->title_ar;
            $jobCategory->save();

            return redirect()->back()->with('success', __('Job category  successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(JobCategory $jobCategory)
    {
        if(\Auth::user()->can('Delete Job Category'))
        {
            if($jobCategory->created_by == \Auth::user()->creatorId())
            {
                $jobCategory->delete();

                return redirect()->back()->with('success', __('Job category successfully deleted.'));
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
