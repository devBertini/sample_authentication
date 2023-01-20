<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendEmailJob;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        if($user->active == false) {
            return response()->json(['error' => 'The given account is Disabled. Please contact at administrator.'], 401);
        }

        if($user->block == true) {
            return response()->json(['error' => 'The given account is blocked. Please perform account recovery to login again.'], 401);
        }

        if(!$user || !Hash::check($request->password, $user->password)) {
            
            if($user->attempts < 4) {
                $user->attempts += 1;

                $user->save();
            } else {
                $user->block = 1;

                if($user->save()) {
                    $data = [
                        'to' => $request->email,
                        'email' => $request->email,
                        'type' => 'block_account',
                        'title' => 'Conta Bloqueada',
                        'color' => "black",
                        'background_color' => "#FFFFFF",
                        'bar_color' => "#7e807c"
                    ];
    
                    Queue::push(new SendEmailJob($data));
                }
                
                return response()->json(['error' => 'The given account is blocked. Please perform account recovery to login again.'], 401);
            }

            return response()->json(['error' => 'It was not possible to access with the informed user.'], 401);
        } else {
            $user->attempts = 0;
            $user->save();
        }

        if($user->admin) {
            $token = $user->createToken('user-admin', ['*'])->plainTextToken;
        } else {
            $token = $user->createToken('user-user', ['*'])->plainTextToken;
        }

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 200);
    }

    public function logout() {
        try {
            auth()->user()->tokens()->delete();

            return response()->json(['message' => 'Successfully logged out'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 404);
        }
    }
}
