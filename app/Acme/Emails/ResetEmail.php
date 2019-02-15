<?php

namespace App\Acme\Emails;


class ResetEmail extends CampaignMonitorEmail
{
    public function getEmailId()
    {
        return '0ff4827c-e3a2-4378-b5e4-184c6ecdf015';
    }

    public function variables($user, $reset_url)
    {
        return [
            'reset_url' => $reset_url,
        ];
    }
}