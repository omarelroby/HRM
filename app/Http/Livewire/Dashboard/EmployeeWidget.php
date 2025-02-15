<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Employee;
use Livewire\Component;

class EmployeeWidget extends Component
{
    public $employees;

    /**
     * @return void
     */
    public function mount()
    {
        $this->loadRecords();
    }

    /**
     * @return void
     */
    private function loadRecords()
    {
        $this->employees = Employee::query()->latest()->take(4)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.employee-widget');
    }
}
