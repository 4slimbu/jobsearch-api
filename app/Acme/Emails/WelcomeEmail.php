<?php

namespace App\Acme\Emails;


class WelcomeEmail extends CampaignMonitorEmail
{
    public function getEmailId()
    {
        return '8985c7bf-280a-469b-b5d5-215041b9b179';
    }

    public function variables($user)
    {
        return [
            'firstname' => $user->first_name,
            'x-apple-data-detectors' => true,
        ];
    }
}