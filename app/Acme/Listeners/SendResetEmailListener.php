<?php

namespace App\Acme\Listeners;

use App\Acme\Emails\ResetEmail;
use App\Acme\Events\UserUpdatedEmailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendResetEmailListener
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
     * @param UserUpdatedEmailEvent $event
     * @return void
     */
    public function handle(UserUpdatedEmailEvent $event)
    {
        $event->user->email = $event->newEmail;

        (new ResetEmail())->withData([
            'reset_url' => config('app.portal_url') . '/reset-email?token=' . $event->token
        ])->sendTo($event->user);
    }
}
