<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $categories = Category::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('category.index', compact('categories'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Employee'))
        {
            return view('category.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Employee'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                    'name_ar' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $category             = new Category();
            $category->name       = $request->name;
            $category->name_ar    = $request->name_ar;
            $category->created_by = \Auth::user()->creatorId();
            $category->save();

            return redirect()->route('category.index')->with('success', __('category  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Category $category)
    {
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($category->created_by == \Auth::user()->creatorId())
            {
                return view('category.edit', compact('category'));
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

    public function update(Request $request, Category $category)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($category->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required',
                                       'name_ar' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $category->name    = $request->name;
                $category->name_ar = $request->name_ar;
                $category->save();

                return redirect()->route('category.index')->with('success', __('category successfully updated.'));
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

    public function destroy(Category $category)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            if($category->created_by == \Auth::user()->creatorId())
            {
                $category->delete();

                return redirect()->route('category.index')->with('success', __('category successfully deleted.'));
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
