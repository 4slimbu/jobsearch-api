<?php

namespace App\Acme\Policies;

use App\Acme\Models\User;
use App\Acme\Models\JobEcomm;

class JobPolicy
{
    public function createJob(User $user)
    {
        return true;
    }

    public function seeJob(User $user, $job)
    {
        return $user->id === $job->user_id || $user->account_id === $job->account_id;
    }

    public function updateJob(User $user, $job)
    {
        return $user->id === $job->user_id || $user->account_id === $job->account_id;
    }

    public function saveJobOptions(User $user, $job)
    {
        return $user->id === $job->user_id || $user->account_id === $job->account_id;
    }

    public function publishJob(User $user, $job)
    {
        return $user->id === $job->user_id || $user->account_id === $job->account_id;
    }

    public function updateJobEndDate(User $user, $job)
    {
        return $user->id === $job->user_id || $user->account_id === $job->account_id;
    }

    public function cloneJob(User $user, $job)
    {
        return $user->id === $job->user_id || $user->account_id === $job->account_id;
    }

    public function expireJob(User $user, $job)
    {
        return $user->id === $job->user_id || $user->account_id === $job->account_id;
    }

    public function saveEcommJob(User $user, $job)
    {
        return $user->id === $job->user_id || $user->account_id === $job->account_id;
    }

    public function deleteDraftJob(User $user, $job)
    {
        return ($user->id === $job->user_id || $user->account_id === $job->account_id) && $job->status === JobEcomm::$STATUS_DRAFT;
    }
}