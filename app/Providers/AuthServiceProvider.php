<?php

namespace App\Providers;

use App\Acme\Models\Affiliate\AffiliatePriority;
use App\Acme\Models\Core\CoreAccount;
use App\Acme\Models\Inventory\InventoryAccountInventory;
use App\Acme\Models\JobEcomm;
use App\Acme\Models\JobHopper;
use App\Acme\Models\JobHopperArchived;
use App\Acme\Models\Performance\PerformanceCampaign;
use App\Acme\Models\Performance\PerformanceCampaignHistory;
use App\Acme\Models\Performance\PerformanceJobHourlyConsumption;
use App\Acme\Models\Performance\PerformanceCampaignPeriod;
use App\Acme\Models\Performance\PerformanceRate;
use App\Acme\Models\SeekerResume;
use App\Acme\Models\SeekerApplies;
use App\Acme\Models\Permission;

use App\Acme\Policies\AccountPolicy;
use App\Acme\Policies\InventoryPolicy;
use App\Acme\Policies\JobPolicy;
use App\Acme\Policies\ResumePolicy;
use App\Acme\Policies\JobApplicationPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
	protected $policies = [
		JobEcomm::class => JobPolicy::class,
		JobHopper::class => JobPolicy::class,
		JobHopperArchived::class => JobPolicy::class,
        CoreAccount::class => AccountPolicy::class,
        InventoryAccountInventory::class => InventoryPolicy::class,
        PerformanceCampaign::class => PerformanceCampaign::class,
        PerformanceCampaignHistory::class => PerformanceCampaignHistory::class,
        PerformanceJobHourlyConsumption::class => PerformanceJobHourlyConsumption::class,
        PerformanceCampaignPeriod::class => PerformanceCampaignPeriod::class,
        PerformanceRate::class => PerformanceRate::class,
        AffiliatePriority::class => AffiliatePriority::class,
        SeekerApplies::class => JobApplicationPolicy::class,
	];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Allow admin to have all permissions
        Gate::before(function($user) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });

        foreach ($this->getPermissions() as $permission) {
            Gate::define($permission->name, function($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
    
}
