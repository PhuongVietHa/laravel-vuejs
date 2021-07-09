<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helper\HelperFunction;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }

    // public function register(Request $request)
    public function register(UserRegisterRequest $request)
    {
        HelperFunction::logInfo("START", __LINE__ ,__FUNCTION__, __FILE__);
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $error = false;
            $message = 'User register successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $error = true;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'error' => $error,
            'message' => $message,
        ];
        return response()->json($response);
    }

    public function login(Request $request)
    {
        HelperFunction::logInfo("START", __LINE__ ,__FUNCTION__, __FILE__);
        $credentials = [
            'name' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $error = false;
            $message = 'User login successfully';
        } else {
            $error = true;
            $message = 'Unauthorised';
        }
        // response
        $response = [
            'error' => $error,
            'message' => $message,
        ];

        return response()->json($response);
    }

    public function logout()
    {
        try {
            Session::flush();
            $error = false;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $error = true;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'error' => $error,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
