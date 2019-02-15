<?php

namespace App\Acme\Controllers;

use App\Acme\Requests\JobApplicationShowStatsRequest;
use App\Acme\Requests\JobCloneRequest;
use App\Acme\Requests\JobGetRequest;
use App\Acme\Requests\JobApplicationShowRequest;
use App\Acme\Requests\JobApplicationUpdateRequest;
use App\Acme\Requests\JobSaveEcommRequest;
use App\Acme\Requests\JobShowRequest;
use App\Acme\Requests\JobUpdateRequest;
use App\Acme\Services\JobService;
use App\Acme\Requests\JobCreateRequest;
use App\Acme\Requests\JobOptionSaveRequest;
use App\Acme\Requests\JobPublishRequest;
use App\Acme\Requests\JobUpdateEndDateRequest;
use App\Acme\Requests\JobApplicantsCvDownloadRequest;

class JobController extends ApiController
{
    private $jobService;

    public function __construct(JobService $jobService)
    {
        $this->middleware('auth:api');
        $this->jobService = $jobService;
    }

    public function index(JobGetRequest $request)
    {
        $input = $request->getInput();
        $user = auth()->user();
        return $this->jobService->getJobs($input, $user);
    }

    public function create(JobCreateRequest $request)
    {
        $input = $request->getInput();
        $user = auth()->user();
        return $this->jobService->createJob($input, $user);
    }

    public function update(JobUpdateRequest $request, $jobUuid)
    {
        $input = $request->getInput();
        $input['job_uuid'] = $jobUuid;
        $user = auth()->user();
        return $this->jobService->updateJob($input, $user);
    }

    public function options(JobOptionSaveRequest $request)
    {
        $input = $request->getInput();
        $user = auth()->user();
        return $this->jobService->saveOptions($input, $user);
    }

    public function publish(JobPublishRequest $request)
    {
        $input = $request->getInput();
        $user = auth()->user();
        return $this->jobService->publishJob($input, $user);
    }

    public function updateEndDate(JobUpdateEndDateRequest $request)
    {   
        $input = $request->getInput();
        $user = auth()->user();
        return $this->jobService->updateEndDate($input, $user);
    }

    public function show(JobShowRequest $request, $jobUuid)
    {
        $input = $request->getInput();
        $input['job_uuid'] = $jobUuid;
        $user = auth()->user();
        return $this->jobService->getJob($input, $user);
    }

    public function showJobApplications(JobApplicationShowRequest $request, $jobUuid)
    {
        $input = $request->getInput();
        $input['job_uuid'] = $jobUuid;
        $user = auth()->user();
        return $this->jobService->getJobApplications($input, $user);
    }

    public function showJobApplicantsStats(JobApplicationShowStatsRequest $request, $jobUuid)
    {
        $input = $request->getInput();
        $input['job_uuid'] = $jobUuid;
        $user = auth()->user();
        return $this->jobService->getJobApplicantsStats($input, $user);
    }

    public function updateApplicationStatus(JobApplicationUpdateRequest $request, $jobUuid, $applicationId)
    {
        $input = $request->getInput();
        $input['job_uuid'] = $jobUuid;
        $input['application_id'] = $applicationId;
        $user = auth()->user();
        return $this->jobService->updateApplicationStatus($input, $user);
    }

	public function clone(JobCloneRequest $request, $jobUuid)
	{
        $input = $request->getInput();
        $input['job_uuid'] = $jobUuid;
        $user = auth()->user();
		return $this->jobService->cloneJob($input, $user);
	}

    public function expire($jobUuid)
    {
        $input['job_uuid'] = $jobUuid;
        $user = auth()->user();
        return $this->jobService->expireJob($input, $user);
    }

    public function stats()
    {
        $user = auth()->user();
        return $this->jobService->getJobsStats($user);
    }

    public function saveEcomm($jobUuid)
    {
        $input['job_uuid'] = $jobUuid;
        $user = auth()->user();
        return $this->jobService->saveEcomm($input, $user);
    }
    
    public function destroy($jobUuid)
    {
        $input['job_uuid'] = $jobUuid;
        $user = auth()->user();
        return $this->jobService->destroyDraftJob($input, $user);
    }

    public function downloadApplicantsResume($applicationId)
    {
        $input['application_id'] = $applicationId;
        $user = auth()->user();
        return $this->jobService->downloadApplicantsResume($input, $user);
    }
}