<?php

namespace App\View\Components\dashboard;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\View\Component;

class JobApplicants extends Component
{
    public $jobApplicants;
    public $openJobs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->openJobs = Job::query()->where('status', 'active')->get();
        $this->jobApplicants = JobApplication::query()->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.job-applicants', [
            'openJobs' => $this->openJobs,
            'jobApplicants' => $this->jobApplicants,
        ]);
    }
}
