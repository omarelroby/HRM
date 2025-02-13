<?php

namespace App\View\Components\dashboard;

use App\Models\AttendanceEmployee;
use Carbon\Carbon;
use Illuminate\View\Component;

class AttendanceOverview extends Component
{
    public $attendanceData;
    public $totalAttendance;
    public $attendancePercentage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Fetch data
        $this->attendanceData = [
            'present' => AttendanceEmployee::where('status', 'present')->count(),
            'late' => AttendanceEmployee::where('status', 'late')->count(),
            'leave' => AttendanceEmployee::where('status', 'leave')->count(),
            'absent' => AttendanceEmployee::where('status', 'absent')->count(),
        ];

        // Calculate total attendance
        $this->totalAttendance = array_sum($this->attendanceData);

        // Calculate Percentage based on status
        $this->attendancePercentage = [];
        foreach ($this->attendanceData as $status => $count) {
            $this->attendancePercentage[$status] = $this->totalAttendance > 0 ?
                round(($count / $this->totalAttendance) * 100, 2)
                : 0;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.attendance-overview', [
            'attendanceData' => $this->attendanceData,
            'totalAttendance' => $this->totalAttendance,
            'attendancePercentage' => $this->attendancePercentage,
        ]);
    }
}
