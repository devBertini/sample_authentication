<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendEmailJob;

class UserController extends Controller
{
    private $user;

    public function __construct(Request $request)
    {
        $this->user = $request->auth;
    }

    public function index(Request $request) {

        if(null !== $request->query('qtdPage')) {
            $qtdPage = $request->query('qtdPage');
        } else {
            $qtdPage = 25;
        }

        try {
            return User::orderBy('name', 'asc')->paginate(
                $perPage = $qtdPage, $columns = ['id', 'name', 'username', 'email', 'mobile', 'admin', 'active', 'block', 'attempts']
            );
            
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 404);
        }
    }

    public function show($id){
        try {
            return User::findOrFail($id);

        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 404);
        }
    }

    public function store(Request $request) {
        try {
            
            $request->validate([
                'name' => 'bail|required|min:3|max:255',
                'username' => 'bail|required|min:3|max:30',
                'email' => 'bail|required|unique:users,email|min:10|max:255',
                'mobile' => 'bail|required|unique:users,mobile|min:11|max:11',
                'admin' => 'bail|required'
            ]);

            $password = $this->generatePassword(16);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'admin' => $request->admin,
                'password' => bcrypt($password)
            ]);

            if($user) {
                $data = [
                    'to' => $user->email,
                    'email' => $user->email,
                    'password' => $password,
                    'type' => 'new_user',
                    'title' => 'Novo Cadastro',
                    'color' => "black",
                    'background_color' => "#FFFFFF",
                    'bar_color' => "#7e807c"
                ];
    
                Queue::push(new SendEmailJob($data));
                return response()->json(['success' => 'The User was created successfully.']);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 400);
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'bail|min:3|max:255',
            'username' => 'bail|min:3|max:30',
            'email' => 'bail|min:10|max:255',
            'mobile' => 'bail|min:11|max:11',
            'password' => 'bail|min:6|max:120'
        ]);

        try {
            $user = User::findOrFail($id);

            if(isset($request->name) && $request->name != $user->name) {
                $user->name = $request->name;
            }

            if(isset($request->username) && $request->username != $user->username) {
                $user->username = $request->username;
            }

            if(isset($request->email) && $request->email != $user->email) {
                $user->email = $request->email;
            }

            if(isset($request->mobile) && $request->mobile != $user->mobile) {
                $user->mobile = $request->mobile;
            }

            if ($user->save()) {
                return response()->json(['success' => 'The User has been successfully updated.']);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    public function updatePassword(Request $request, $id){
        $this->validate($request, [
            'password' => 'bail|required|min:6|max:120'
        ]);
        
        try {
            $user = User::findOrFail($id);
            $user->password = bcrypt($request->password);
            
            if ($user->save()) {
                return response()->json(['success' => 'The User password has been successfully updated.']);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 404);
        }
    }

    public function recovey(Request $request){
        $this->validate($request, [
            'email' => 'bail|required|min:3|max:65',
        ]);

        try {

            $user = User::where('email', $request->email)->firstOrFail();

            if($user->active == false) {
                return response()->json(['status' => 'error', 'message' => 'We were unable to recover your account as it is disabled. Please contact the administrator.'], 400);
            }

            $password = $this->generatePassword(16);

            $user->password = bcrypt($password);
            $user->attempts = 0;
            $user->block = 0;

            if ($user->save()) {

                $data = [
                    'to' => $user->email,
                    'email' => $user->email,
                    'password' => $password,
                    'type' => 'recovery_account',
                    'title' => 'Recuperação de Acesso',
                    'color' => "black",
                    'background_color' => "#FFFFFF",
                    'bar_color' => "#7e807c"
                ];

                Queue::push(new SendEmailJob($data));
                return response()->json(['success' => 'If the email provided is correct, you will receive your access data within a few moments.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    private function generatePassword($length) {
        $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lowercase = "abcdefghijklmnopqrstuvwxyz";
        $numbers = "0123456789";
        $symbols = "!@#$%^&*()_-=+;:,.?";

        $all = $uppercase . $lowercase . $numbers . $symbols;
        $password = $uppercase[rand(0, strlen($uppercase) - 1)];
        $password .= $lowercase[rand(0, strlen($lowercase) - 1)];
        $password .= $numbers[rand(0, strlen($numbers) - 1)];
        $password .= $symbols[rand(0, strlen($symbols) - 1)];

        while (strlen($password) < $length) {
            $password .= $all[rand(0, strlen($all) - 1)];
        }

        $password = str_shuffle($password);

        return $password;
    }
}
