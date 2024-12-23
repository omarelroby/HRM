<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\EmployeeResource;
use App\Mail\sendemail;
use Validator;
use App\Models\User;
use App\Models\FCMToken;
use App\Models\Employee;
use App\Models\AttendanceEmployee;
use App\Traits\ApiResponser;

class AuthController extends Controller
{
 
    use ApiResponser;

    public function login(Request $request)
    {
        /** @var array $validatedData */
        $validatedData = $this->validate($request, [
            'login_id'  => 'required|string',
            'password'  => 'required|string',
            'device_id' => 'required|string',
            'push_id'   => 'required|string',
        ]);

        /** @var Employee|Null $employee */
        $employee = User::findByLoginID($validatedData['login_id']);

        /** @var Employee|Null $check */
        $check = User::findByDeviceID($validatedData['device_id']);

        if(!$employee or !Hash::check($validatedData['password'], $employee->password)) {
            return $this->error(__('messages.credential'), 401);
        }

        // if ($check and $check->id != $employee->id) {
        //     return $this->error(__('messages.deviceUsedBefore'), 401);
        // }

        if (!$employee->user_status) {
            return $this->error(__('messages.suspended'), 401);
        }

        // if ($employee->device_id and $employee->device_id != $validatedData['device_id']) {
        //     return $this->error(__('messages.device_id'), 401);
        // }

        if (!$employee->device_id) {
            $employee->device_id = $validatedData['device_id'];
            $employee->save();
        }

        $employee->fcm()->delete();

        $employee->fcm()->create([
            'employee_id' => $employee->id,
            'company_id'  => $employee->created_by,
            'token'       => $validatedData['push_id'],
        ]);

        $employee->update(['fcm_token' => $validatedData['push_id'] ]);

        /** @var string $token */ 
        $token = $employee->createToken('MyApp')->plainTextToken;

        return $this->success([
            'employee' => new EmployeeResource($employee),
            'company'  => new CompanyResource($employee->company),
            'setting'  => company_setting(),
            'token' => $token,
        ], __('messages.login'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        $token = FCMToken::where('employee_id', auth()->id())->first();
        $token->update([
            'token' => ''
        ]);
        return $this->success([], __('messages.logout'));
    }

}
