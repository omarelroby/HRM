<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Event;
use App\Models\EventEmployee;
use App\Models\Projects;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utility;
use App\Imports\EventImport;
use App\Exports\EventExport;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    public function index()
    {
        if (\Auth::user()->can('Manage Event')) {
            // Fetch employees and events created by the current user
            $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get();
            $events = Event::where('created_by', '=', \Auth::user()->creatorId())->get();

            // Prepare events for FullCalendar
            $arrEvents = [];
            foreach ($events as $event) {
                // Validate event dates
                if (!empty($event->start_date) && !empty($event->end_date)) {
                    $arr = [
                        'id' => $event->id,
                        'title' => $event->title,
                        'start' => $event->start_date,
                        'end' => $event->end_date,
                        'backgroundColor' => $event->color,
                        'borderColor' => "#fff",
                        'textColor' => "white",
                        'url' => route('event.edit', $event->id),
                    ];
                    $arrEvents[] = $arr;
                }
            }

            // Sort events by start_date
            usort($arrEvents, function ($a, $b) {
                return strtotime($a['start']) - strtotime($b['start']);
            });

            // Convert events to JSON and prepare for FullCalendar
            $arrEvents = json_encode($arrEvents);
            $arrEvents = str_replace('"[', '[', str_replace(']"', ']', $arrEvents));

            // Fetch branches and departments created by the current user
            $branch = Branch::where('created_by', '=', \Auth::user()->creatorId())->get();
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->get();
            dd(print_r())
            // Return the view with the necessary data
            return view('dashboard.event.index', compact('arrEvents', 'employees', 'branch', 'departments'));
        } else {
            // Redirect if the user doesn't have permission
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if (\Auth::user()->can('Create Event')) {
            $employees   = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch      = Branch::where('created_by', '=', \Auth::user()->creatorId())->get();
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('dashboard.event.create', compact('employees', 'branch', 'departments'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {

        if (\Auth::user()->can('Create Event')) {

            $validator = \Validator::make(
                $request->all(),
                [
                    'branch_id' => 'required',
                    'department_id' => 'required',
                    'employee_id' => 'required',
                    'title' => 'required',
                     'title_ar' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'color' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $event                = new Event();
            $event->branch_id     = $request->branch_id;
            $event->department_id = json_encode($request->department_id);
            $event->employee_id   = json_encode($request->employee_id);
            $event->title         = $request->title;
            $event->title_ar         = $request->title_ar;
            $event->start_date    = $request->start_date;
            $event->end_date      = $request->end_date;
            $event->color         = $request->color;
            $event->description   = $request->description;
            $event->description_ar   = $request->description_ar;
            $event->created_by    = \Auth::user()->creatorId();
            $event->save();

            //  slack
            $setting = Utility::settings(\Auth::user()->creatorId());
            $branch = Branch::find($request->branch_id);
            if (isset($setting['event_notification']) && $setting['event_notification'] == 1) {
                $msg = $request->title . ' ' . __("for branch") . ' ' . $branch->name . ' ' . ("from") . ' ' . $request->start_date . ' ' . __("to") . ' ' . $request->end_date . '.';
                Utility::send_slack_msg($msg);
            }

            //telegram
            $setting = Utility::settings(\Auth::user()->creatorId());
            $branch = Branch::find($request->branch_id);
            if (isset($setting['telegram_ticket_notification']) && $setting['telegram_ticket_notification'] == 1) {
                $msg = $request->title . ' ' . __("for branch") . ' ' . $branch->name . ' ' . ("from") . ' ' . $request->start_date . ' ' . __("to") . ' ' . $request->end_date . '.';
                Utility::send_telegram_msg($msg);
            }


            //twilio
            $setting = Utility::settings(\Auth::user()->creatorId());
            $branch = Branch::find($request->branch_id);
            $departments = Department::where('branch_id', $request->branch_id)->first();
            $employee = Employee::where('branch_id', $request->branch_id)->first();

            if (isset($setting['twilio_event_notification']) && $setting['twilio_event_notification'] == 1) {
                $employeess = Employee::whereIn('branch_id', $request->employee_id)->get();
                foreach ($employeess as $key => $employee) {
                    $msg = $request->title . ' ' . __("for branch") . ' ' . $branch->name . ' ' . ("from") . ' ' . $request->start_date . ' ' . __("to") . ' ' . $request->end_date . '.';
                    Utility::send_twilio_msg($employee->phone, $msg);
                }
            }



            if (in_array('0', $request->employee_id)) {
                $departmentEmployee = Employee::whereIn('department_id', $request->department_id)->get()->pluck('id');
                $departmentEmployee = $departmentEmployee;
            } else {
                $departmentEmployee = $request->employee_id;
            }
            foreach ($departmentEmployee as $employee) {
                $eventEmployee              = new EventEmployee();
                $eventEmployee->event_id    = $event->id;
                $eventEmployee->employee_id = $employee;
                $eventEmployee->created_by  = \Auth::user()->creatorId();
                $eventEmployee->save();
            }

            return redirect()->route('event.index')->with('success', __('Event  successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Event $event)
    {
        return redirect()->route('event.index');
    }

    public function edit($event)
    {

        if (\Auth::user()->can('Edit Event')) {
            $event = Event::find($event);
            if ($event->created_by == Auth::user()->creatorId()) {
                $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');

                return view('dashboard.event.edit', compact('event', 'employees'));
            } else {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Event $event)
    {
        if (\Auth::user()->can('Edit Event')) {
            if ($event->created_by == \Auth::user()->creatorId()) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'title' => 'required',
                        'title_ar' => 'required',
                        'start_date' => 'required',
                        'end_date' => 'required',
                        'color' => 'required',
                    ]
                );
                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $event->title       = $request->title;
                $event->title_ar       = $request->title_ar;
                $event->start_date  = $request->start_date;
                $event->end_date    = $request->end_date;
                $event->color       = $request->color;
                $event->description = $request->description;
                $event->description_ar   = $request->description_ar;
                $event->save();

                return redirect()->route('event.index')->with('success', __('Event successfully updated.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Event $event)
    {
        if (\Auth::user()->can('Delete Event')) {
            if ($event->created_by == \Auth::user()->creatorId()) {
                $event->delete();

                return redirect()->route('event.index')->with('success', __('Event successfully deleted.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function export()
    {
        $name = 'event' . date('Y-m-d i:h:s');
        $data = Excel::download(new EventExport(), $name . '.xlsx');
        if(ob_get_contents()) ob_end_clean();

        return $data;
    }

    public function importFile()
    {
        return view('event.import');
    }

    public function import(Request $request)
    {
        // dd('here');
        $rules = [
            'file' => 'required|mimes:csv,txt',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $events = (new EventImport())->toArray(request()->file('file'))[0];
        // dd($events);
        $totalEvents = count($events) - 1;
        $errorArray    = [];

        for ($i = 1; $i <= count($events) - 1; $i++) {

            $event = $events[$i];
            // dd($event[2]);
            $eventsByTitle = Event::where('title', $event[2])->first();

            if (!empty($eventsByTitle)) {
                $eventData = $eventsByTitle;
            } else {
                $eventData = new Event();
            }

            $eventData->branch_id           = $event[0];
            $eventData->department_id       = $event[1];
            $eventData->employee_id         = '["0"]';
            $eventData->title               = $event[2];
            $eventData->start_date          = $event[3];
            $eventData->end_date            = $event[4];
            $eventData->color               = $event[5];
            $eventData->description         = $event[6];
            $eventData->created_by          = $event[7];

            if (empty($eventData)) {
                $errorArray[] = $eventData;
            } else {
                $eventData->save();
            }
        }

        $errorRecord = [];
        if (empty($errorArray)) {
            $data['status'] = 'success';
            $data['msg']    = __('Record successfully imported');
        } else {
            $data['status'] = 'error';
            $data['msg']    = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalEvents . ' ' . 'record');


            foreach ($errorArray as $errorData) {

                $errorRecord[] = implode(',', $errorData);
            }

            \Session::put('errorArray', $errorRecord);
        }

        return redirect()->back()->with($data['status'], $data['msg']);
    }

    public function getdepartment(Request $request)
    {

        if ($request->branch_id == 0) {
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } else {
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->where('branch_id', $request->branch_id)->get()->pluck('name', 'id')->toArray();
        }

        return response()->json($departments);
    }

    public function getemployee(Request $request)
    {
        if (in_array('0', $request->department_id)) {
            $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } else {
            $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->whereIn('department_id', $request->department_id)->get()->pluck('name', 'id')->toArray();
        }

        return response()->json($employees);
    }
}
