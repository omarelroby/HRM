<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\DocumentType;
use App\Models\Employee;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function index()
    {

        $document_types = DocumentType::where('created_by', '=', \Auth::user()->creatorId())
            ->orWhere('created_by',1)
            ->get();

        return view('dashboard.document_type.index', compact('document_types'));

    }

    public function create()
    {
        if(\Auth::user()->can('Create Branch')||(auth()->user()->type='super admin'))
        {
            $employees = Employee::where('created_by', \Auth::user()->creatorId())

                ->get()->pluck('name', 'id');
            return view('branch.create',compact('employees'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
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
            $type                = new DocumentType();
            $type->name          = $request->name;
            $type->name_ar       = $request->name_ar;
            $type->created_by    = \Auth::user()->creatorId();
            $type->save();
            return redirect()->route('document-type.index')->with('success', __('Document Type  successfully created.'));

    }

    public function show(Branch $branch)
    {
        return redirect()->route('branch.index');
    }

    public function edit(DocumentType $documentType)
    {

        return view('dashboard.document_type.edit', compact('documentType'));

    }

    public function update(Request $request, DocumentType $documentType)
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

                // $branch->employee_id   = $request->employee_id;
                $documentType->name          = $request->name;
                $documentType->name_ar       = $request->name_ar;
                $documentType->save();

                return redirect()->route('document-type.index')->with('success', __('Document Type successfully updated.'));


    }

    public function destroy(DocumentType $documentType)
    {

            if($documentType->created_by == \Auth::user()->creatorId())
            {
                $documentType->delete();
                return redirect()->route('document-type.index')->with('success', __('Document Type successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }

    }

}
