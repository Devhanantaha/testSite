<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use function __;
use function auth;
use function public_path;
use function request;
use Hash;
use App\Http\Requests\PasswordUpdateRequest;


class AuthController extends Controller
{

    use ApiResponse;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ], [
            'email.required' => 'A email is required',
            'password.required' => 'A password is required',
        ]);

        if (auth()->guard()->attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1'])) {
            $user = auth()->guard()->user();
            $token = $user->createToken('apiToken')->plainTextToken;
            $user->api_token = $token;
            $user->save();
            return $this->okApiResponse($user, __("USer information"));
        } else {
            $user = User::where('email', $request->email)->first();
            if ($user->status == 0)
                return $this->errorApiResponse([], 401, __('auth_login_account_bloacked'));
            else
                return $this->errorApiResponse([], 401, __('auth_login_failed'));
        }
    }





    private function generateToken($user)
    {
        $user->tokens()->delete();
        return $user->createToken("Mobile:token");
    }


    function saveImage($file, $folder = '/')
    {
        request()->files->remove('link');

        $fileName = time() . rand(10, 99) . $file->getClientOriginalName();
        $dest = public_path('/uploads/' . $folder);
        $file->move($dest, $fileName);

        $uploaded_file = 'uploads/' . $folder . '/' . $fileName;
        return $uploaded_file;
    }


    public function logout()
    {
        // Revoke a specific user token
        auth()->guard('api')->user()->tokens()->delete();
        return $this->okApiResponse([], __("Logged out successfully"));
    }

    public function updateToken(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->fcm_token = $request->token;
            $user->save();
            return $this->okApiResponse([], __("Update token success"));
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                'success' => false
            ], 500);
        }
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {

        $user = auth()->user();
        $user->password = Bcrypt($request->password);
        $user->save();
        return $this->createdApiResponse($user, __("Password Updated Successfully"));
    }
}
