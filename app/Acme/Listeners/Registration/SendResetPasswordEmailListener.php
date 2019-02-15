<?php

namespace App\Acme\Listeners\Registration;

use App\Acme\Emails\ResetPasswordEmail;
use App\Acme\Events\Registration\UserForgotPasswordEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendResetPasswordEmailListener
{
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
     * @param UserForgotPasswordEvent $event
     * @return void
     */
    public function handle(UserForgotPasswordEvent $event)
    {
        (new ResetPasswordEmail())->withData([
            'reset_url' => config('app.portal_url') . '/reset-password?token=' . $event->token . '&email=' . $event->user['email']
        ])->sendTo($event->user);
    }
}
