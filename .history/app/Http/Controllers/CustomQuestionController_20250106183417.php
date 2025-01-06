<?php

namespace App\Http\Controllers;

use App\Models\CustomQuestion;
use Illuminate\Http\Request;

class CustomQuestionController extends Controller
{

    public function index()
    {
        if(\Auth::user()->can('Manage Custom Question'))
        {
            $questions = CustomQuestion::where('created_by', \Auth::user()->creatorId())->get();
            $is_required = CustomQuestion::$is_required;

            return view('dashboard.customQuestion.index', compact('questions','is_required'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        $is_required = CustomQuestion::$is_required;

        return view('customQuestion.create', compact('is_required'));
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Custom Question'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'question' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $question              = new CustomQuestion();
            $question->question    = $request->question;
            $question->is_required = $request->is_required;
            $question->created_by  = \Auth::user()->creatorId();
            $question->save();

            return redirect()->back()->with('success', __('Question successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(CustomQuestion $customQuestion)
    {
        //
    }

    public function edit(CustomQuestion $customQuestion)
    {
        $is_required = CustomQuestion::$is_required;
        return view('dashboard.customQuestion.edit', compact('customQuestion','is_required'));
    }

    public function update(Request $request, CustomQuestion $customQuestion)
    {
        if(\Auth::user()->can('Edit Custom Question'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'question' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $customQuestion->question    = $request->question;
            $customQuestion->is_required = $request->is_required;
            $customQuestion->save();

            return redirect('@extends('dashboard.layouts.master')

@section('page-title')
    {{ __('Job') }}
@endsection

@section('content')
    <div class="row">
        <!-- Card for Job Title Update -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Update Job') }}</h5>
                </div>
                <div class="card-body">
                    {{ Form::model($customQuestion, ['route' => ['custom-question.update', $customQuestion->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
                    <div class="row">
                        <!-- Question Field -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                {{ Form::label('question', __('Question'), ['class' => 'form-label']) }}
                                {{ Form::text('question', null, ['class' => 'form-control', 'placeholder' => __('Enter question'), 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please enter a question.') }}</div>
                            </div>
                        </div>

                        <!-- Is Required Field -->
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                {{ Form::label('is_required', __('Is Required'), ['class' => 'form-label']) }}
                                {{ Form::select('is_required', $is_required, null, ['class' => 'form-control select2', 'required' => 'required']) }}
                                <div class="invalid-feedback">{{ __('Please select whether the question is required.') }}</div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Datepicker Script -->
    <script>
        $(function () {
            $(".datepicker").hijriDatePicker({
                format: 'YYYY-M-D',
                showSwitcher: false,
                hijri: false,
                useCurrent: true,
            });
        });
    </script>
@endsection')->with('success', __('Question successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(CustomQuestion $customQuestion)
    {
        if(\Auth::user()->can('Delete Custom Question'))
        {
            $customQuestion->delete();

            return redirect()->back()->with('success', __('Question successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
