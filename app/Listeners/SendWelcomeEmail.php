<?php

namespace App\Listeners;

use App\Events\CompanyCreated;
use App\Models\EmailTemplate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    public function handle(CompanyCreated $event)
    {
        // Fetch the email template
        $template = EmailTemplate::where('id',1)->first();

        if ($template) {
            // Replace placeholders with actual values
            $content = str_replace(
                ['{app_name}', '{email}', '{password}', '{app_url}'],
                [config('app.name'), $event->email, $event->password, config('app.url')],
                $template->message
//                app()->getLocale()=='ar'?$template->message_ar:$template->message
            );

            $subject = str_replace('{app_name}', config('app.name'), $template->subject);

            // Send the email
            Mail::raw($content, function ($message) use ($event, $subject) {
                $message->to($event->email)
                    ->subject($subject);
            });
        }
    }
}
