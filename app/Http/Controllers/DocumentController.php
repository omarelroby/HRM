<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {

        if(\Auth::user()->can('Manage Document Type'))
        {
            $documents = Document::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('dashboard.document.index', compact('documents'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Document Type'))
        {
            return view('document.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Document Type'))
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

            $document              = new Document();
            $document->name        = $request->name;
            $document->name_ar        = $request->name_ar;
            $document->is_required = $request->is_required;
            $document->created_by  = \Auth::user()->creatorId();
            $document->save();

            return redirect()->route('document.index')->with('success', __('Document type successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Document $document)
    {
        return redirect()->route('document.index');
    }

    public function edit(Document $document)
    {
        if(\Auth::user()->can('Edit Document Type'))
        {
            if($document->created_by == \Auth::user()->creatorId())
            {

                return view('dashboard.document.edit', compact('document'));
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

    public function update(Request $request, Document $document)
    {

        if(\Auth::user()->can('Edit Document Type'))
        {
            if($document->created_by == \Auth::user()->creatorId())
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


                $document->name        = $request->name;
                $document->name_ar        = $request->name_ar;
                $document->is_required = $request->is_required;
                $document->save();

                return redirect()->route('document.index')->with('success', __('Document type successfully updated.'));
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

    public function destroy(Document $document)
    {
        if(\Auth::user()->can('Delete Document Type'))
        {
            if($document->created_by == \Auth::user()->creatorId())
            {
                $document->delete();

                return redirect()->route('document.index')->with('success', __('Document type successfully deleted.'));
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
    public function expiry_docs()
    {
        if(auth()->user()->type=='company')
        {
            $threeMonthsFromNow = Carbon::now()->addMonths(3);
            $records = Document::with('document_type', 'employee')
                ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                ->whereNotNull('end_date')
                ->where('created_by', auth()->user()->id)
                ->paginate(20); // Paginate records with 10 per page

            $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                return $record->document_type->name ?? 'Other';
            });

            $records->setCollection(collect($groupedRecords));
//            dd($records);
            $data['records'] = $records;
        }
        else
        {
            $threeMonthsFromNow = Carbon::now()->addMonths(3);
            $records = Document::with('document_type', 'employee')
                ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                ->whereNotNull('end_date')
                ->paginate(20); // Paginate records with 10 per page

            $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                return $record->document_type->name ?? 'Other';
            });

            $records->setCollection(collect($groupedRecords));

            $data['records'] = $records;
        }
        if(auth()->user()->type=='employee')
        {
            $employee=Employee::where('user_id',auth()->user()->id)->firstOrFail();
            if($employee->sub_dep_id==0)
            {
                $threeMonthsFromNow = Carbon::now()->addMonths(3);
                $records = Document::with('document_type', 'employee')
                    ->whereHas('employee',function ($query) use ($employee){
                        $query->where('department_id',$employee->department_id);
                    })
                    ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                    ->whereNotNull('end_date')
                    ->paginate(20); // Paginate records with 10 per page

                $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                    return $record->document_type->name ?? 'Other';
                });

                $records->setCollection(collect($groupedRecords));
                $data['records'] = $records;
            }
            elseif($employee->section_id==0)
            {
                $threeMonthsFromNow = Carbon::now()->addMonths(3);
                $records = Document::with('document_type', 'employee')
                    ->whereHas('employee',function ($query) use ($employee){
                        $query->where('sub_dep_id',$employee->sub_dep_id);
                    })
                    ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                    ->whereNotNull('end_date')
                    ->paginate(20); // Paginate records with 10 per page

                $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                    return $record->document_type->name ?? 'Other';
                });

                $records->setCollection(collect($groupedRecords));
                $data['records'] = $records;
            }
            else{
                $threeMonthsFromNow = Carbon::now()->addMonths(3);
                $records = Document::with('document_type', 'employee')

                    ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                    ->whereNotNull('end_date')
                    ->paginate(20); // Paginate records with 10 per page

                $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                    return $record->document_type->name ?? 'Other';
                });

                $records->setCollection(collect($groupedRecords));
                $data['records'] = $records;
            }
        }

        return view('dashboard.employeeDocs',$data);
    }
}
