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
    public function __construct(array $attendanceData = [], int $totalAttendance = 0, array $attendancePercentage = [])
    {
        if (empty($attendanceData)) {
            // Fetch data
            $attendanceData = [
                'present' => AttendanceEmployee::where('status', 'present')->count(),
                'late' => AttendanceEmployee::where('status', 'late')->count(),
                'leave' => AttendanceEmployee::where('status', 'leave')->count(),
                'absent' => AttendanceEmployee::where('status', 'absent')->count(),
            ];

            $totalAttendance = array_sum($attendanceData);

            // Calculate percentage
            $attendancePercentage = [];
            foreach ($attendanceData as $status => $count)
            {
                $attendancePercentage[$status] = $totalAttendance > 0
                    ? round(($count / $totalAttendance) * 100, 2)
                    : 0;
            }
        }

        $this->attendanceData = $attendanceData;
        $this->totalAttendance = $totalAttendance;
        $this->attendancePercentage = $attendancePercentage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.attendance-overview',[
            'attendanceData' => $this->attendanceData,
            'totalAttendance' => $this->totalAttendance,
            'attendancePercentage' => $this->attendancePercentage,
        ]);
    }
}
