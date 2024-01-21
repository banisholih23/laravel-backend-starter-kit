<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){

            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){

            config(['auth.guards.user.provider' => 'admin']);
            
            $token = Auth::guard('admin')->user()->createToken('MyApp',['admin'])->accessToken;
            
            return response()->json(['token' => $token], 200);

        }else{ 

            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    public function adminDashboard()
    {
        // return response()->json(Auth::guard('admin')->user());
        // dd(Auth::guard('admin')->check());
        if (!$request->user()->tokenCan('admin')) {
            return response()->json([
                'message' => "Unauthenticated",
            ]);
        }
    }
}
