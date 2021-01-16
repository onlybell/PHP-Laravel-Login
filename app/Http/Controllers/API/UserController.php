<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Log;
use Validator;
use Session;

class UserController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    /**
     * User Login Process
     *
     * @return \Illuminate\Http\Request  $request
     */
    public function login(Request $request)
    {
        //Log::info('------------->'.$request['email']);

        if ($request['email'] == '1' && $request['password'] == '2') {
            Session::put('variableName', 'JJ');

            //session(['key' => 'value']);
           // $request->session()->put('my_name','Virat Gandhi');
            //$request->session()->put('user.teams', 'developers');

            // $credentials = $request->only('email', 'password');
            // if (Auth::attempt($credentials)) {
            // }
            
            // $userInfo = [
            //     'name' => 'JJ',
            //     'email' => $request['email']
            // ];

            // $user = new User;
            // $user->name = 'JJ';
            // $user->email = '1';
            // Auth::login($user);

            //Auth::login(true);
            //$request->session()->put('userName', 'JJ');

            return $this->sendResponse('', 'Login Sucessed!');
        }
        
        return $this->sendError('Login Failed!');
        

    }

    public function userinfo() 
    {
        if (Session::has('variableName')) {
            Log::info('111------------->'.Session::get('variableName'));
        }
        

        // Log::info('-------------> '.Auth::user());
        // if(Auth::check()){
        //     Log::info('-------------> Yes');
        // }
        // else {
        //     Log::info('------------->'.session('key'));
        // }

        return $this->sendResponse('JJ', 'User Detail');
    }

    // public function logout(Request $request) 
    // {
    //     $request->session()->flush();
    //     Auth::logout();
    //     return Redirect('login');
    // }
}
