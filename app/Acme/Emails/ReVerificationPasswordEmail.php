<?php

namespace App\Acme\Emails;


class ReVerificationPasswordEmail extends CampaignMonitorEmail
{
    public function getEmailId()
    {
        return 'f71ca63f-2c07-4659-915e-23dae1e9252f';
    }

    public function variables($user, $reset_url)
    {
        return [
            'firstname' => $user->first_name,
            'reset_url' => $reset_url,
        ];
    }
}