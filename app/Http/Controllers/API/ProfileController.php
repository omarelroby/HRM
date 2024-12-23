<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\DocumentResource;
use App\Models\User;
use App\Models\DucumentUpload;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Validator;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Api\V1\User
 */
class ProfileController extends Controller
{
    use ApiResponser;

    public function index(Request $request)
    {
        return new ProfileResource(\Auth::user()->employee);
    }

    public function me()
    {
        return $this->success([
            'notifications'      => [],
            'employee'           => new EmployeeResource(auth()->user()),
            'company'            => new CompanyResource(auth()->user()->company),
            'setting'            => company_setting(),
        ],'');
    }

    public function update_picture(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'profile' => 'sometimes:nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 404);
            }

            if($request->has('profile')) {
                $image_name = auth()->id().'_profile'.time().'.'.request()->profile->getClientOriginalExtension();
                $request->profile->move(public_path('storage/uploads/'), $image_name);
                User::find(auth()->id())->update([
                    'avatar' => 'uploads/'.$image_name
                ]);
            } else {
                User::find(auth()->id())->update([
                    'avatar' => ''
                ]);
            }
            return $this->success('', __('messages.data_updated'));
        } catch(\Exception $ex) {
            return $this->success('', __('messages.data_updated'));
        }
    }

    public function reset(Request $request) {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if($validator->fails()) {            
            return response()->json([
            'status' => 'false',
            'message' => 'Invalid Data',
            'errors' => [$validator->errors()->first()]], 200);
        }
        $user = auth()->user();
        if(!Hash::check($request->old_password,  $user->password)) {
            return $this->errorResponse(__('messages.error_password'), 200);
        };
        $user->update([
            'password' => $request->password
        ]);
        return $this->success('', __('messages.data_updated'));
    }

    public function documents()
    {
        $documents    = DucumentUpload::where('employee_id',auth()->user()->employee->id)->get();
        return DocumentResource::collection($documents);
    }

}
