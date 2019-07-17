<?php

namespace App\Acme\Listeners\Registration;

use App\Acme\Emails\VerificationEmail;
use App\Acme\Events\Registration\UserVerifyEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendVerificationEmailListener implements ShouldQueue
{
    use InteractsWithQueue, Queueable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param UserVerifyEvent $event
     * @return void
     */
    public function handle(UserVerifyEvent $event)
    {
        /**
         * Todo: This is not required as Auth is handled by laravel. But still confirm it.
         */
        Mail::to($event->user->email)->send(new VerificationEmail($event->user, $event->token));
    }
}
