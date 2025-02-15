<?php

namespace App\View\Components\dashboard;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\View\Component;

class JobApplicants extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.job-applicants');
    }
}
