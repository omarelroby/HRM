<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\AttendanceEmployee;
use Carbon\Carbon;
use Livewire\Component;

class AttendanceOverview extends Component
{
    public $attendanceData = [];
    public $attendancePercentage = [];
    public $totalAttendance = 0;
    public $filter = 'today';

    /**
     * @return void
     */
    public function mount()
    {
        $this->getAttendanceData();
    }

    /**
     * @return void
     */
    public function getAttendanceData()
    {
        $query = AttendanceEmployee::query();

        // Apply date filter
        switch ($this->filter) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'this_week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'this_month':
                $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'this_year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
            case 'all':
                break;

        }
        $this->attendanceData = [
            'present' => (clone $query)->where('status', 'present')->count(),
            'late' => (clone $query)->where('status', 'late')->count(),
            'leave' => (clone $query)->where('status', 'leave')->count(),
            'absent' => (clone $query)->where('status', 'absent')->count(),
        ];

        $this->totalAttendance = array_sum($this->attendanceData);

        // Calculate Percentage
        foreach ($this->attendanceData as $key => $value) {
            $this->attendancePercentage[$key] = $this->totalAttendance > 0
                ? round(($value / $this->totalAttendance) * 100, 1)
                : 0;
        }

        $this->dispatchBrowserEvent('updateChart', [
            'attendanceData' => $this->attendanceData
        ]);
    }

    /**
     * @param $filter
     * @return void
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->getAttendanceData();
    }

    public function render()
    {
        return view('livewire.dashboard.attendance-overview',[
            'filter' => $this->filter,
        ]);
    }
}
