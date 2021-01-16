<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Log;
use Session;
use Auth;

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
        if ($request['email'] == 'test@test.com' && $request['password'] == '123456') {
           
            $request->session()->regenerate();
            $user = new User();
            $user->email = $request['email'];
            $user->name = 'Joshua Lee';
            $request->session()->put('authenticated',true);
            $request->session()->put('user', $user);

            return $this->sendResponse('', 'Sign in Sucessed!');
        }
        
        return $this->sendError('Sign in Failed!');
    }

    public function userinfo(Request $request) 
    {
        $key =  $request->session()->get('user');

        return $this->sendResponse($key, 'User Detail');
    }

    public function logout(Request $request) 
    {
        $request->session()->flush();
        return $this->sendResponse('', 'Sign out!');
    }
}
