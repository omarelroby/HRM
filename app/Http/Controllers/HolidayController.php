<?php

namespace App\Http\Controllers;

use App\Exports\HolidayExport;
use App\Imports\HolidayImport;
use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HolidayController extends Controller
{

    public function index(Request $request)
    {
        if(\Auth::user()->can('Manage Holiday')) {
            $holidays = Holiday::where('created_by', '=', \Auth::user()->creatorId());

            if (!empty($request->start_date)) {
                $holidays->where('date', '>=', $request->start_date);
            }
            if (!empty($request->end_date)) {
                $holidays->where('date', '<=', $request->end_date);
            }
            $holidays = $holidays->get();

            return view('dashboard.holiday.index', compact('holidays'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if (\Auth::user()->can('Create Holiday')) {
            return view('holiday.create');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if (\Auth::user()->can('Create Holiday')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'date' => 'required',
                    'occasion' => 'required',
                    'occasion_ar' => 'required',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $holiday             = new Holiday();
            $holiday->date       = $request->date;
            $holiday->occasion   = $request->occasion;
            $holiday->occasion_ar   = $request->occasion_ar;
            $holiday->created_by = \Auth::user()->creatorId();
            $holiday->save();

            // slack
            $setting = Utility::settings(\Auth::user()->creatorId());
            if (isset($setting['Holiday_notification']) && $setting['Holiday_notification'] == 1) {
                $msg = $request->occasion . ' ' . __("on") . ' ' . $request->date . '.';
                Utility::send_slack_msg($msg);
            }

            // telegram
            $setting = Utility::settings(\Auth::user()->creatorId());
            if (isset($setting['telegram_Holiday_notification']) && $setting['telegram_Holiday_notification'] == 1) {
                $msg = $request->occasion . ' ' . __("on") . ' ' . $request->date . '.';
                Utility::send_telegram_msg($msg);
            }

            return redirect()->route('holiday.index')->with(
                'success',
                'Holiday successfully created.'
            );
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show(Holiday $holiday)
    {
        //
    }


    public function edit(Holiday $holiday)
    {
        if (\Auth::user()->can('Edit Holiday')) {
            return view('dashboard.holiday.edit', compact('holiday'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, Holiday $holiday)
    {
        if (\Auth::user()->can('Edit Holiday')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'date' => 'required',
                    'occasion' => 'required',
                    'occasion_ar' => 'required',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $holiday->date     = $request->date;
            $holiday->occasion = $request->occasion;
            $holiday->occasion_ar   = $request->occasion_ar;
            $holiday->save();

            return redirect()->route('holiday.index')->with(
                'success',
                'Holiday successfully updated.'
            );
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Holiday $holiday)
    {
        if (\Auth::user()->can('Delete Holiday')) {
            $holiday->delete();

            return redirect()->route('holiday.index')->with(
                'success',
                'Holiday successfully deleted.'
            );
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function calender(Request $request)
    {
        if (\Auth::user()->can('Manage Holiday')) {
            $holidays = Holiday::where('created_by', '=', \Auth::user()->creatorId());

            if (!empty($request->start_date)) {
                $holidays->where('date', '>=', $request->start_date);
            }
            if (!empty($request->end_date)) {
                $holidays->where('date', '<=', $request->end_date);
            }
            $holidays = $holidays->get();

            $arrHolidays = [];

            foreach ($holidays as $holiday) {

                $arr['id']        = $holiday['id'];
                $arr['title']     = $holiday['occasion'];
                $arr['start']     = $holiday['date'];
                $arr['className'] = 'bg-primary';
                $arr['url']       = route('holiday.edit', $holiday['id']);
                $arrHolidays[]    = $arr;
            }
            $arrHolidays = str_replace('"[', '[', str_replace(']"', ']', json_encode($arrHolidays)));


            return view('holiday.calender', compact('arrHolidays'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function export(Request $request)
    {
        $name = 'holidays_' . date('Y-m-d i:h:s');
        $data = Excel::download(new HolidayExport(), $name . '.xlsx');
        if(ob_get_contents()) ob_end_clean();

        return $data;
    }
    public function importFile(Request $request)
    {
        return view('holiday.import');
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
        $holidays = (new HolidayImport())->toArray(request()->file('file'))[0];


        $totalholiday = count($holidays) - 1;
        $errorArray    = [];
        for ($i = 1; $i <= $totalholiday; $i++) {
            $holiday = $holidays[$i];

            $holiydayData = Holiday::where('date', $holiday[0])->where('occasion', $holiday[1])->first();

            if (!empty($holiydayData)) {
                $errorArray[] = $holiydayData;
            } else {
                $holidays_data = new Holiday();
                $holidays_data->date = $holiday[0];
                $holidays_data->occasion = $holiday[1];
                $holidays_data->created_by = Auth::user()->id;
                $holidays_data->save();
            }
        }


        if (empty($errorArray)) {
            $data['status'] = 'success';
            $data['msg']    = __('Record successfully imported');
        } else {

            $data['status'] = 'error';
            $data['msg']    = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalholiday . ' ' . 'record');


            foreach ($errorArray as $errorData) {
                $errorRecord[] = implode(',', $errorData->toArray());
            }

            \Session::put('errorArray', $errorRecord);
        }

        return redirect()->back()->with($data['status'], $data['msg']);
    }
}
