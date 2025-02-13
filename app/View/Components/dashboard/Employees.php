<?php

namespace App\View\Components\dashboard;

use App\Models\Employee;
use Illuminate\View\Component;

class Employees extends Component
{
    public $employees;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->employees = Employee::query()->latest()->take(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.employees', [
            'employees' => $this->employees
        ]);
    }
}
