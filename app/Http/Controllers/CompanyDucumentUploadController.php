<?php

namespace App\Http\Controllers;

use App\Models\CompanyDucumentUpload;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CompanyDucumentUploadController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Request $request)
    {
        if(\Auth::user()->can('Create Document'))
        {
            return view('company_documents.create');
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
                $request->all(), 
                [
                    'name' => 'required',
                    'document' => 'mimes:jpeg,png,jpg,svg,pdf,doc,zip|max:20480',
                ]);

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
                $dir             = storage_path('uploads/companydocumentUpload/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('document')->storeAs('uploads/companydocumentUpload/', $fileNameToStore);
            }

            $document              = new CompanyDucumentUpload();
            $document->name        = $request->name;
            $document->document    = !empty($request->document) ? $fileNameToStore : '';
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


    public function show(CompanyDucumentUpload $ducumentUpload)
    {
        //
    }


    public function edit($id)
    {
        if(\Auth::user()->can('Edit Document'))
        {
            $ducumentUpload = CompanyDucumentUpload::find($id);
            return view('company_documents.edit', compact('ducumentUpload'));
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
                               ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            $document = CompanyDucumentUpload::find($id);

            if(!empty($request->document))
            {
                $filenameWithExt = $request->file('document')->getClientOriginalName();
                $filename        = pathinfo(implode(' ',$filenameWithExt), PATHINFO_FILENAME);
                $extension       = $request->file('document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/companydocumentUpload/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('document')->storeAs('uploads/companydocumentUpload/', $fileNameToStore);

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
            $document = CompanyDucumentUpload::find($id);
            if($document->created_by == \Auth::user()->creatorId())
            {
                $document->delete();

                $dir = storage_path('uploads/companydocumentUpload/');

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
