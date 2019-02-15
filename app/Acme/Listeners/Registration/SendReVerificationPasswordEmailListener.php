<?php

namespace App\Acme\Listeners\Registration;

use App\Acme\Emails\ReVerificationPasswordEmail;
use App\Acme\Events\Registration\UserReVerificationPasswordEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReVerificationPasswordEmailListener
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
     * @param UserReVerificationPasswordEvent $event
     * @return void
     */
    public function handle(UserReVerificationPasswordEvent $event)
    {
        (new ReVerificationPasswordEmail())->withData([
            'reset_url' => config('app.portal_url') . '/reset-password?token=' . $event->token . '&email=' . $event->user['email']
        ])->sendTo($event->user);
    }
}
