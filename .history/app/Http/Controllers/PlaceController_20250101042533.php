<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Employee;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Branch'))
        {
            $places = Place::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.places.index', compact('places'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Branch'))
        {
            return view('places.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Branch'))
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

            $place                = new Place();
            $place->name          = $request->name;
            $place->name_ar       = $request->name_ar;
            $place->lat           = $request->lat;
            $place->lon           = $request->lon;
            $place->created_by    = \Auth::user()->creatorId();
            $place->save();

            return redirect()->route('place.index')->with('success', __('Location  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Place $place)
    {
        return redirect()->route('places.index');
    }

    public function edit(Place $place)
    {
        if(\Auth::user()->can('Edit Branch'))
        {
            if($place->created_by == \Auth::user()->creatorId())
            {
                return view('dashboard.places.edit', compact('place'));
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

    public function update(Request $request, Place $place)
    {
        if(\Auth::user()->can('Edit Branch'))
        {
            if($place->created_by == \Auth::user()->creatorId())
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

                $place->name          = $request->name;
                $place->name_ar       = $request->name_ar;
                $place->lat           = $request->lat;
                $place->lon           = $request->lon;
                $place->save();

                return redirect()->route('place.index')->with('success', __('Location successfully updated.'));
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

    public function destroy(Place $place)
    {
        if(\Auth::user()->can('Delete Branch'))
        {
            if($place->created_by == \Auth::user()->creatorId())
            {
                $place->delete();
                return redirect()->route('place.index')->with('success', __('Location successfully deleted.'));
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
