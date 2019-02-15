<?php

namespace App\Acme\Emails;


class ResetPasswordEmail extends CampaignMonitorEmail
{
    public function getEmailId()
    {
        return '6c90e125-9c80-402e-aa41-7e0acd501e3c';
    }

    public function variables($user, $reset_url)
    {
        return [
            'reset_url' => $reset_url,
        ];
    }
}