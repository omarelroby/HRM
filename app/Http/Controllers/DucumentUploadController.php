<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
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

            $documents = Document::where('created_by', \Auth::user()->creatorId())->get();
            $documentTypes = DocumentType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employees= Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name','id');

            return view('dashboard.documentUpload.index', compact('documents','documentTypes','employees'));
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
