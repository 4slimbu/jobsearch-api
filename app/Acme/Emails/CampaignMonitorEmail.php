<?php

namespace App\Acme\Emails;

use CS_REST_Transactional_SmartEmail;

abstract class CampaignMonitorEmail extends ApiEmail
{
    protected $apiKey;
    protected $data = [];

    public function __construct($apiKey = null)
    {
        $this->apiKey = config('services.campaign_monitor.key');
    }

    public function sendTo($user)
    {
        $mailer = $this->newTransaction();

        $data = call_user_func_array(
            [$this, 'variables'],
            array_merge(compact('user'), $this->data)
        );

        return $mailer->send([
            'To' => $user['email'],
            'Data' => $data,
        ], 'no');
    }

    protected function newTransaction()
    {
        return new CS_REST_Transactional_SmartEmail(
            $this->getEmailId(),
            ['api_key' => $this->apiKey]
        );
    }

    protected abstract function getEmailId();

    /**
     * @param array $data
     */
    public function withData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}