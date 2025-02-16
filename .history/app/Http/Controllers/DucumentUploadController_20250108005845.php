<?php

namespace App\Http\Controllers;

use App\Models\DucumentUpload;
use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DucumentUploadController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('Manage Document'))
        {
            if(\Auth::user()->type == 'company')
            {
                $documents = DucumentUpload::where('created_by', \Auth::user()->creatorId())->get();
            }
            else
            {
                $userRole  = \Auth::user()->roles->first();
                $documents = DucumentUpload::whereIn(
                    'role', [
                              $userRole->id,
                              0,
                          ]
                )->where('created_by', \Auth::user()->creatorId())->get();
                $roles = Role::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
                $roles->prepend('All', '0');
                $employees= Employee::where('created_by', \Auth::user()->creator

            }

            return view('dashboard.documentUpload.index', compact('documents'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
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

            $document              = new DucumentUpload();
            $document->employee_id = $request->employee_id;
            $document->name        = $request->name;
            $document->document    = !empty($request->document) ? $fileNameToStore : '';
            $document->role        = $request->role;
            $document->description = $request->description;
            $document->created_by  = \Auth::user()->creatorId();
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
            $roles = Role::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $roles->prepend('All', '0');

            $ducumentUpload = DucumentUpload::find($id);

            return view('documentUpload.edit', compact('roles', 'ducumentUpload'));
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
                $filename        = pathinfo(implode(' ',$filenameWithExt), PATHINFO_FILENAME);
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


            $document->name = $request->name;
            if(!empty($request->document))
            {
                $document->document = !empty($request->document) ? $fileNameToStore : '';
            }

            $document->role        = $request->role;
            $document->description = $request->description;
            $document->save();

            return redirect()->back()->with('success', __('Document successfully uploaded.'));
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
            $document = DucumentUpload::find($id);
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
