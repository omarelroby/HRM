<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Job;
use App\Models\JobApplication;
use Livewire\Component;

class JobApplicants extends Component
{
    public $jobApplicants;
    public $openJobs;

    public function mount()
    {
        $this->loadRecords();
    }
    public function render()
    {
        return view('livewire.dashboard.job-applicants');
    }

    private function loadRecords()
    {
        $this->openJobs = Job::query()->where('status', 'active')->get();
        $this->jobApplicants = JobApplication::query()->latest()->get();
    }
}
