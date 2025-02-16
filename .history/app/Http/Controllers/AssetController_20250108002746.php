<?php

namespace App\Http\Controllers;

use App\Exports\AssetsExport;
use App\Imports\AssetsImport;
use App\Models\Asset;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
    public function index()
    {
        if (\Auth::user()->can('Manage Assets')) {
            $assets = Asset::where('created_by', '=', \Auth::user()->creatorId())->get();
            $employees= Employee::where('created_by', '=', \Auth::user()->creatorId())->get()-><i class="fa fa-plug" aria-hidden="true"></i>;
            // $employeeId = $request->employee_id;

            return view('dashboard.assets.index', compact('assets','employees'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create(Request $request)
    {
        if (\Auth::user()->can('Create Assets')) {

            $employeeId = $request->employee_id;
            return view('assets.create',compact('employeeId'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if (\Auth::user()->can('Create Assets')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'purchase_date' => 'required',
                    'supported_date' => 'required',
                    'amount' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $assets                 = new Asset();
            $assets->employee_id    = $request->employee_id;
            $assets->name           = $request->name;
            $assets->purchase_date  = $request->purchase_date;
            $assets->supported_date = $request->supported_date;
            $assets->amount         = $request->amount;
            $assets->description    = $request->description;
            $assets->created_by     = \Auth::user()->creatorId();
            $assets->save();

            return back()->with('success', __('Assets successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Asset $asset)
    {
        //
    }


    public function edit($id)
    {

        if (\Auth::user()->can('Edit Assets')) {
            $asset = Asset::find($id);

            return view('dashboard.assets.edit', compact('asset'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $id)
    {
        if (\Auth::user()->can('Edit Assets')) {
            $asset = Asset::find($id);
            if ($asset->created_by == \Auth::user()->creatorId()) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required',
                        'purchase_date' => 'required',
                        'supported_date' => 'required',
                        'amount' => 'required',
                    ]
                );
                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $asset->name           = $request->name;
                $asset->purchase_date  = $request->purchase_date;
                $asset->supported_date = $request->supported_date;
                $asset->amount         = $request->amount;
                $asset->description    = $request->description;
                $asset->save();

                return back()->with('success', __('Assets successfully updated.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy($id)
    {
        if (\Auth::user()->can('Delete Assets')) {
            $asset = Asset::find($id);
            if ($asset->created_by == \Auth::user()->creatorId()) {
                $asset->delete();

                return back()->with('success', __('Assets successfully deleted.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function export()
    {
        $name = 'assets_' . date('Y-m-d i:h:s');
        $data = Excel::download(new AssetsExport(), $name . '.xlsx');
        if (ob_get_contents()) ob_end_clean();
        return $data;
    }
    public function importFile(Request $request)
    {
        return view('assets.import');
    }
    public function import(Request $request)
    {

        $rules = [
            'file' => 'required|mimes:csv,txt',
        ];
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $assets = (new AssetsImport())->toArray(request()->file('file'))[0];

        $totalassets = count($assets) - 1;
        $errorArray    = [];

        for ($i = 1; $i <= $totalassets; $i++) {
            $asset = $assets[$i];

            $assetsData = Asset::where('name', $asset[0])->where('purchase_date', $asset[1])->first();


            if (!empty($assetsData)) {
                $errorArray[] = $assetsData;
            } else {
                $asset_data = new Asset();
                $asset_data->name=$asset[0];
                $asset_data->purchase_date=$asset[1];
                $asset_data->supported_date=$asset[2];
                $asset_data->amount=$asset[3];
                $asset_data->description=$asset[4];
                $asset_data->created_by = Auth::user()->id;
                $asset_data->save();
            }
        }

        if (empty($errorArray)) {
            $data['status'] = 'success';
            $data['msg']    = __('Record successfully imported');
        } else {

            $data['status'] = 'error';
            $data['msg']    = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalassets . ' ' . 'record');


            foreach ($errorArray as $errorData) {
                $errorRecord[] = implode(',', $errorData->toArray());
            }

            \Session::put('errorArray', $errorRecord);
        }

        return redirect()->back()->with($data['status'], $data['msg']);
    }
}
