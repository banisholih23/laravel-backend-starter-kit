<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
use Auth;

class UserAuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if($validator->fails()){

            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])){

            config(['auth.guards.api.provider' => 'user']);
            
            $token = Auth::guard('user')->user()->createToken('MyApp',['user'])->accessToken;

            // dd(Auth::guard('user')->user());
            
            return response()->json(['token' => $token], 200);

        }else{ 

            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }    

    public function userDashboard()
    {
       dd('im here');
    }
}
