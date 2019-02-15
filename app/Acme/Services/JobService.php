<?php

namespace App\Acme\Services;

use App\Acme\Models\ApplyType;
use App\Acme\Models\Job;
use App\Acme\Models\JobHopper;
use App\Acme\Models\JobHopperArchived;
use App\Acme\Models\SeekerApplies;
use App\Acme\Models\SeekerResume;
use App\Acme\Resources\JobResource;
use App\Acme\Resources\SeekerApplicationResource;
use App\Acme\Traits\ApiResponseTrait;
use DB;
use Ramsey\Uuid\Uuid;
use App\Acme\Models\JobEcomm;
use App\Acme\Models\Inventory\InventoryAccountInventory;
use App\Acme\Models\Core\CoreProduct;

class JobService extends ApiServices
{
    use ApiResponseTrait;

    public function getJobs($input, $user)
    {
        if ($input['job_status'] === 'open') {
            $jobs = $this->getJobsSearchOpen($input, $user->account_id);
        } else if ($input['job_status'] === 'draft') {
            $jobs = $this->getJobsSearchEcomm($input, $user->id);
        } else if ($input['job_status'] === 'expired') {
            $jobs = $this->getJobsSearchExpired($input, $user->account_id);
        }

        return JobResource::collection($jobs);
    }

    private function getJobsSearchOpen($input, $accountId)
    {
        if (empty($accountId)) {
            return collect();
        }

        $pagination = DB::table('smartfeed_hopper_jobs')->select('id')->where('account_id', $accountId)->whereNotNull('account_id')->paginate();
        $offset = ($pagination->currentPage() - 1) * $pagination->perPage();

        // Build the actual query
        $sql = 'SELECT j.id FROM';
        $sql .= '(';
        $sql .= 'SELECT j.*';
        $sql .= ' FROM `smartfeed_hopper_jobs` j';
        $sql .= ' LEFT JOIN `core_locations` l';
        $sql .= ' ON j.`location_id` = l.id';
        $sql .= ' WHERE j.`account_id` = ' . $accountId;
        $sql .= ' AND j.`account_id` is not null';

        if (!empty($input['query'])) {
            $sql .= ' AND (';
            $sql .= ' INSTR(j.`job_title`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(j.`source_reference`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(j.`advertiser_reference`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(j.`id`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(j.`uuid`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(j.`uuid`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`suburb_name`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`state_code`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`state_name`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`country_code`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`country_name`, "' . $input['query'] . '")';
            $sql .= ' OR l.`post_code` = "' . $input['query'] . '"';
            $sql .= ')';
        }

        $sql .= ') j';
        $sql .= ' LIMIT ' . $pagination->perPage() . ' OFFSET ' . $offset;

        $jobIds = collect(DB::select($sql))->pluck('id');

        $jobsItems = JobHopper::whereIn('id', $jobIds)->with('applications', 'applyClicks')->get();

        return $pagination->setCollection($jobsItems);
    }

    private function getJobsSearchEcomm($input, $userId)
    {
        $jobs = JobEcomm::where('user_id', $userId)->whereIn('status', [JobEcomm::$STATUS_DRAFT, JobEcomm::$STATUS_PROCESSING, JobEcomm::$STATUS_UPDATING]);
        if (!empty($input['query'])) {
            $jobs = $jobs->where(function($query) use ($input) {
                $query->where('job_title', 'LIKE', '%' . $input['query'] . '%')
                    ->orWhere('uuid', 'LIKE', '%' . $input['query'] . '%')
                    ->orWhereHas('location', function($query) use ($input) {
                        $query->where('suburb_name', 'LIKE', '%' . $input['query'] . '%')
                            ->orWhere('state_code', 'LIKE', '%' . $input['query'] . '%')
                            ->orWhere('country_code', 'LIKE', '%' . $input['query'] . '%')
                            ->orWhere('post_code', 'LIKE', '%' . $input['query'] . '%');
                    });
            });
        }

        return $jobs->paginate();
    }

    private function getJobsSearchExpired($input, $accountId)
    {
        if (empty($accountId)) {
            return collect();
        }

        $now = now();
        $pagination = DB::table('smartfeed_hopper_jobs_archived')->select('id')->where('account_id', $accountId)->whereNotNull('account_id')->where('expires_at', '<', $now)->paginate();
        $offset = ($pagination->currentPage() - 1) * $pagination->perPage();

        // Build the actual query
        $sql = 'SELECT ja.id FROM';
        $sql .= '(';
        $sql .= 'SELECT ja.*';
        $sql .= ' FROM `smartfeed_hopper_jobs_archived` ja';
        $sql .= ' LEFT JOIN `core_locations` l';
        $sql .= ' ON ja.`location_id` = l.id';
        $sql .= ' WHERE ja.`account_id` = ' . $accountId;
        $sql .= ' AND ja.`account_id` is not null';
        $sql .= ' AND ja.`expires_at` < "' . $now . '"';

        if (!empty($input['query'])) {
            $sql .= ' AND (';
            $sql .= ' INSTR(ja.`job_title`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(ja.`source_reference`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(ja.`advertiser_reference`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(ja.`id`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(ja.`uuid`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`suburb_name`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`state_code`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`state_name`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`country_code`, "' . $input['query'] . '")';
            $sql .= ' OR INSTR(l.`country_name`, "' . $input['query'] . '")';
            $sql .= ' OR l.`post_code` = "' . $input['query'] . '"';
            $sql .= ')';
        }

        $sql .= ') ja';
        $sql .= ' ORDER BY ja.`expires_at` DESC ';
        $sql .= ' LIMIT ' . $pagination->perPage() . ' OFFSET ' . $offset;

        $jobIds = collect(DB::select($sql))->pluck('id');

        $jobsItems = JobHopperArchived::whereIn('id', $jobIds)->orderBy('expires_at', 'DESC')->with('applications', 'applyClicks')->get();

        return $pagination->setCollection($jobsItems);
    }

    public function createJob($input, $user)
    {
        $input['user_id'] = $user->id;
        $input['account_id'] = $user->account_id;
	    $input['status'] = JobEcomm::$STATUS_DRAFT;
        $input['uuid'] = Uuid::uuid4()->toString();
        
        if (!isset($input['pay_is_hidden'])) {
            $input['pay_is_hidden'] = 1;
        } else {
            $input['pay_is_hidden'] = 0;
        }
        
        $job = JobEcomm::create($input);

        $job->attributeOptions()->sync(array_filter($input['attribute_option_ids']));

        return new JobResource($job);
    }

    public function updateJob($input, $user)
    {
        $job = JobEcomm::uuid($input['job_uuid'])->firstOrFail();

        if (!$user->can('updateJob', $job)) {
            return $this->respondWithNotAllowed();
        }

        if (!isset($input['pay_is_hidden'])) {
            $input['pay_is_hidden'] = 1;
        } else {
            $input['pay_is_hidden'] = 0;
        }

        if($job->status != 'draft') {
            if($input['publish']){
                $input['status'] = 'processing';
            } else {
                $input['status'] = 'updating';
            }
        }

        $job->update($input);

        $job->attributeOptions()->sync(array_filter($input['attribute_option_ids']));

        return new JobResource($job);
    }

    public function saveOptions($input, $user)
    {
	    $job = JobEcomm::findOrFail($input['job_id']);
	    if (!$user->can('saveJobOptions', $job)) {
            return $this->respondWithNotAllowed();
	    }

        /*
        ID:1 onsite
        Standard apply - no email - application is received on site and no email sent
        ID:2 offsite-job-view
        Offsite apply - job view - redirect goes to job view page - suitable for Flow
        ID:3 offsite-apply
        Offsite apply - applciation page - redirect goes to application page
        ID:4 email
        Standard apply - send email - application is received on site and sent to either a user email address (pretty email) or ATS email address (formatted for ATS)
        ID:5 disable-apply
        No apply action - job ad content contains instructions to apply (ie. phone number to call) - only used for WAN currently
        */

        if($input['application_preference_id'] == "1") {

            if($input['notification_frequency_id'] == "4") {
                $apply_type_id = ApplyType::$APPLY_TYPE_ONSITE_ID;
            } else {
                $apply_type_id = ApplyType::$APPLY_TYPE_EMAIL_ID;
            }

        } else {
            if($input['apply_link_type'] == "1") {
                $apply_type_id = ApplyType::$APPLY_TYPE_OFFSITE_JOBVIEW_ID;
            } else {
                $apply_type_id = ApplyType::$APPLY_TYPE_OFFSITE_APPLY_ID;
            }
        }

        $input['apply_type_id'] = $apply_type_id;

        if($job->status != 'draft') {
            if($input['publish']){
                $input['status'] = 'processing';
            } else {
                $input['status'] = 'updating';
            }
        }

        $job->update($input);

        $job->attributeOptions()->sync(array_filter($input['attribute_option_ids']));

        return new JobResource($job);
    }

    public function getJob($input, $user)
    {
        $job = '';
        if (empty($input['job_status']) || $input['job_status'] === 'draft') {
            $job = JobEcomm::where('uuid', $input['job_uuid'])->firstOrFail();
        } else if ($input['job_status'] === 'open') {
            $job = JobHopper::where('uuid', $input['job_uuid'])->with('applications', 'applyClicks')->firstOrFail();
        } else if ($input['job_status'] === 'expired') {
            $job = JobHopperArchived::where('uuid', $input['job_uuid'])->with('applications', 'applyClicks')->firstOrFail();
        }

	    if (!$user->can('seeJob', $job)) {
	        return $this->respondWithNotAllowed();
	    }

        return new JobResource($job);
    }

    public function getJobApplications($input, $user)
    {
        $job = '';
        if ($input['job_status'] === 'open') {
            $job = JobHopper::where('uuid', $input['job_uuid'])->firstOrFail();
        } else if ($input['job_status'] === 'expired') {
            $job = JobHopperArchived::where('uuid', $input['job_uuid'])->firstOrFail();
        }

        if (!$user->can('seeJob', $job)) {
            return $this->respondWithNotAllowed();
        }

        $applicants = SeekerApplies::where('job_uuid', $input['job_uuid'])->onSite()->orderBy('apply_date', 'DESC');

        if (!empty($input['status'])) {
            $applicants = $applicants->where('status', $input['status']);
        }

        if (!empty($input['query'])) {
            $applicants = $applicants->whereHas('seekerUser', function($query) use ($input) {
                $query->where('first_name', 'LIKE', '%' . $input['query'] . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $input['query'] . '%')
                    ->orWhere('email', 'LIKE', '%' . $input['query'] . '%')
                    ->orWhere('contact_number', 'LIKE', '%' . $input['query'] . '%');
            });
        }

        $applicants = $applicants->paginate();

        return SeekerApplicationResource::collection($applicants);
    }

    public function getJobApplicantsStats($input, $user)
    {
        $job = '';
        if ($input['job_status'] === 'open') {
            $job = JobHopper::where('uuid', $input['job_uuid'])->firstOrFail();
        } else if ($input['job_status'] === 'expired') {
            $job = JobHopperArchived::where('uuid', $input['job_uuid'])->firstOrFail();
        }

        if (!$user->can('seeJob', $job)) {
            return $this->respondWithNotAllowed();
        }

        $applicants = SeekerApplies::with('seekerUser')->onSite()->where('job_uuid', $input['job_uuid'])->get();

        $new = $applicants->filter(function($item) {
            return $item->status === 'new';
        })->count();

        $shortlisted = $applicants->filter(function($item) {
            return $item->status === 'shortlisted';
        })->count();

        $interviewed = $applicants->filter(function($item) {
            return $item->status === 'interviewed';
        })->count();

        $offered = $applicants->filter(function($item) {
            return $item->status === 'offered';
        })->count();

        $unsuccessful = $applicants->filter(function($item) {
            return $item->status === 'unsuccessful';
        })->count();

        return [
            'data' => [
                'applicants_count' => $applicants->count(),
                'applicants_new_count' => $new,
                'applicants_shortlisted_count' => $shortlisted,
                'applicants_interviewed_count' => $interviewed,
                'applicants_offered_count' => $offered,
                'applicants_unsuccessful_count' => $unsuccessful,
            ],
        ];
    }

    public function updateApplicationStatus($input, $user)
    {
        $job = '';
        if ($input['job_status'] === 'open') {
            $job = JobHopper::where('uuid', $input['job_uuid'])->firstOrFail();
        } else if ($input['job_status'] === 'expired') {
            $job = JobHopperArchived::where('uuid', $input['job_uuid'])->firstOrFail();
        }

        if (!$user->can('seeJob', $job)) {
            return $this->respondWithNotAllowed();
        }

        $application = SeekerApplies::findOrFail($input['application_id']);
        $application->status = $input['status'];
        $application->save();
        return new SeekerApplicationResource($application);
    }

    public function publishJob($input, $user)
    {
        $job = JobEcomm::findOrFail($input['job_id']);
	    if(!$user->can('publishJob', $job)) {
            return $this->respondWithNotAllowed();
        }

        $job->expires_at = date("Y-m-d H:i:s", $input['expires_at']);
        $job->original_expires_at = date("Y-m-d H:i:s", $input['original_expires_at']);
        $job->activates_at = date("Y-m-d H:i:s", $input['activates_at']);
        $job->auto_refresh = $input['auto_refresh'];
        $job->bolded_listing = $input['bolded_listing'];
        $job->exposer_careerone_ad_network = $input['exposer_careerone_ad_network'];
        $job->remarketing = $input['remarketing'];
        $job->ecomm_package_id = $input['ecomm_package_id'];
        $job->status = 'processing';
        $job->save();

        $product = CoreProduct::where('ecomm_package_id',$input['ecomm_package_id'])->first();
        $accountInventory = InventoryAccountInventory::where([
			['account_id', '=', $user->account_id],
			['product_id', '=', $product->id]
		])->first();

        $accountInventory->qty_available = $accountInventory->qty_available - 1;
        $accountInventory->save();

        return new JobResource($job);
    }

    public function cloneJob($input, $user)
    {
        $job = '';
        if ($input['job_status'] === 'open') {
            $job = JobHopper::where('uuid', $input['job_uuid'])->firstOrFail();
        } else if ($input['job_status'] === 'expired') {
            $job = JobHopperArchived::where('uuid', $input['job_uuid'])->firstOrFail();
        } else if ($input['job_status'] === 'draft') {
            $job = JobEcomm::where('uuid', $input['job_uuid'])->firstOrFail();
        }

	    if (!$user->can('cloneJob', $job)) {
            return $this->respondWithNotAllowed();
        }

        // Save job into ecomm table
        $ecomm = new JobEcomm();
        foreach($ecomm->getFillable() as $field) {
            $ecomm->{$field} = isset($job->{$field}) ? $job->{$field} : NULL;
        }
        $ecomm->uuid = Uuid::uuid4()->toString();
        $ecomm->activates_at = NULL;
        $ecomm->expires_at = NULL;
        $ecomm->status = JobEcomm::$STATUS_DRAFT;
        $ecomm->save();

        $ecomm->attributeOptions()->sync($job->attributeOptions);

        return new JobResource($ecomm);
    }

    public function expireJob($input, $user)
    {
        $jobHopper = JobHopper::uuid($input['job_uuid'])->firstOrFail();
        $jobHopper->expires_at = now();
        $jobHopper->save();

        if (!$user->can('expireJob', $jobHopper)) {
            return $this->respondWithNotAllowed();
        }

        $jobEcomm = JobEcomm::uuid($input['job_uuid'])->first();
        if (!empty($jobEcomm)) {
            $jobEcomm->expires_at = now();
            $jobEcomm->status = JobEcomm::$STATUS_EXPIRED;
            $jobEcomm->save();

            if (!$user->can('expireJob', $jobEcomm)) {
                return $this->respondWithNotAllowed();
            }
        }

        $jobHopper->load('applications', 'applyClicks');

        return new JobResource($jobHopper);
    }

    public function updateEndDate($input, $user)
    {
        $job = JobEcomm::findOrFail($input['job_id']);
	    if (!$user->can('updateJobEndDate', $job)) {
            return $this->respondWithNotAllowed();
        }

        if($job->status == 'processing') {
            $job->activates_at = date("Y-m-d H:i:s", $input['activates_at']);
        }

        $job->expires_at = date("Y-m-d H:i:s", $input['expires_at']);
        $job->status = 'processing';
        $job->save();

        return new JobResource($job);
    }

    public function getJobsStats($user)
    {
        $jobsOpenUuids = JobHopper::select('uuid')->searchByAccount($user->account_id)->pluck('uuid');
        $jobsOpenCount = count($jobsOpenUuids);

        $jobsDraftCount = JobEcomm::select('uuid')->where('user_id', $user->id)->whereIn('status', [JobEcomm::$STATUS_DRAFT, JobEcomm::$STATUS_PROCESSING, JobEcomm::$STATUS_UPDATING])->count();

        $jobsExpiredCount = JobHopperArchived::select('uuid')->searchByAccount($user->account_id)->expired()->count();

        $applicationsNewJobsOpenCount = SeekerApplies::select('job_uuid')->where('status', SeekerApplies::$STATUS_NEW)->whereIn('job_uuid', $jobsOpenUuids)->onSite()->count();
        $applicationsJobsOpenCount = SeekerApplies::select('job_uuid', 'status')->whereIn('job_uuid', $jobsOpenUuids)->onSite()->count();

        return [
            'data' => [
                'jobs_open_count' => $jobsOpenCount,
                'jobs_open_applications_count' => $applicationsJobsOpenCount,
                'jobs_open_applications_new_count' => $applicationsNewJobsOpenCount,
                'jobs_draft_count' => $jobsDraftCount,
                'jobs_expired_count' => $jobsExpiredCount,
            ],
        ];
    }

    public function saveEcomm($input, $user)
    {
        $job = JobHopper::uuid($input['job_uuid'])->firstOrFail();
        if (!$user->can('saveEcommJob', $job)) {
            return $this->respondWithNotAllowed();
        }

        // Save job into ecomm table
        $ecomm = new JobEcomm();
        foreach($ecomm->getFillable() as $field) {
            $ecomm->{$field} = isset($job->{$field}) ? $job->{$field} : NULL;
        }

        $ecomm->reference_number = empty($job->advertiser_reference) ? $job->source_reference : $job->advertiser_reference;

        $ecomm->status = JobEcomm::$STATUS_UPDATING;
        $ecomm = $ecomm->updateOrCreate(['uuid' => $job->uuid], $ecomm->toArray());

        $ecomm->attributeOptions()->sync($job->attributeOptions);

        return new JobResource($ecomm);
    }

    public function destroyDraftJob($input, $user)
    {
        $job = JobEcomm::uuid($input['job_uuid'])->firstOrFail();
        if (!$user->can('deleteDraftJob', $job)) {
            return $this->respondWithNotAllowed();
        }
        $job->delete();
    }

    public function downloadApplicantsResume($input, $user)
    {
        $application = SeekerApplies::findOrFail($input['application_id']);
        
        if (!$user->can('seeJobApplication', $application)) {
            return $this->respondWithNotAllowed();
        }
        
        $resume = SeekerResume::where('id', $application->resume_id)->firstOrFail();
        return response()->streamDownload(function () use ($resume) {
            echo file_get_contents($resume->full_file_path);
        }, $resume->file_name);
    }
}