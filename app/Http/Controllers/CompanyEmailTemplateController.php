<?php

namespace App\Http\Controllers;

use App\Models\CompanyEmailTemplate;
use App\Models\Department;
use App\Models\EmailTemplate;
use App\Models\Employee;
use App\Mail\TicketSend;
use App\Models\Task;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CompanyEmailTemplateController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->type == 'company' ) {

            $emails= CompanyEmailTemplate::get();
            return view('dashboard.company_email_template.index', compact('emails'));
         }
    }



    public function update(Request $request, $id)
    {
         $email = CompanyEmailTemplate::find($id);

         if (!$email) {
            return redirect()->back()->with('error', __('Email Template not found.'));
        }

        $validator = \Validator::make(
            $request->all(),
            [
                'subject' => 'required']
             );

        // Return validation errors, if any
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $email->subject = $request->subject;
        $email->message = $request->message;
        $email->message_ar = $request->message_ar;
        $email->save();
         return redirect()->route('company-email-template.index')->with('success', __('Email Template successfully updated.'));

    }

    public function show(Ticket $ticket)
    {
        return redirect()->route('ticket.index');
    }

    public function edit($id)
    {
         $email = CompanyEmailTemplate::find($id);
        return view('dashboard.company_email_template.edit', compact('email'));

    }


    public function destroy(CompanyEmailTemplate $companyEmailTemplate)
    {
        $companyEmailTemplate->delete();
        return redirect()->route('company-email-template.index')->with('error', __('Email successfully deleted.'));
    }


}
