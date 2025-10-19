<?php

namespace App\Http\Controllers\Api\Instructor;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Resources\InstructorResource;
use App\Http\Requests\InstructorRequest;
use App\Models\Instructor;
use Bcrypt;

class AuthController extends Controller
{

    use ApiResponse;

    // login step 1
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:instructors,email',
            'password' => 'required'
        ], [
            'email.required' => 'A email is required',
            'password.required' => 'A password is required',
        ]);


        if (Auth::guard('instructors-login')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => '1'])) {
            $token = auth::guard('instructors-login')->user()->createToken('apiToken')->plainTextToken;
            $user = auth::guard('instructors-login')->user();
            $user->api_token = $token;
            $user->save();
            return $this->okApiResponse(new InstructorResource($user), __("Instructor information"));
        } else {
            $user = Instructor::where('email', $request->email)->first();
            if ($user->active == 0)
                return $this->errorApiResponse([], 401, __('auth_login_account_bloacked'));
            else
                return $this->errorApiResponse([], 401, __('auth_login_failed'));
        }
    }


    public function register(InstructorRequest $request)
    {

        
        $user = Instructor::create($request->except('password'));
        $user->password = Bcrypt($request->password);
        $user->active = '0';
        $user->save();
        return $this->createdApiResponse(new InstructorResource($user),__("Account Created Successfully"));
    }

    public function logout()
    {
        // Revoke a specific user token
        auth()->guard('instructors')->user()->tokens()->delete();
        return $this->okApiResponse([], __("Logged out successfully"));
    }


    public function updatePassword(PasswordUpdateRequest $request)
    {

        $user = auth()->guard('instructors')->user();
        $user->password = Bcrypt($request->password);
        $user->save();
        return $this->createdApiResponse(new ClinicResource($user), __("Password Updated Successfully"));
    }
}
