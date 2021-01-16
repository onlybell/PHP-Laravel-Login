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
        Log::info('email ------------->'.$request['email']);
        Log::info('password ------------->'.$request['password']);

        if ($request['email'] == '1' && $request['password'] == '2') {
            Log::info('-------------> Login Sucessed!');
            // session([
            //     'loginCheck' => true,
            //     'userName' => 'Joshua Lee'
            // ]);
            // $request->session()->save();
            //Session::put('userName','Joshua Lee');

            $request->session()->regenerate();
            $user = new User();
            $user->email = $request['email'];
            $user->name = 'Joshua Lee';
            $request->session()->put('authenticated',true);
            $request->session()->put('user', $user);

            //$request->session()->put('userName','Joshua');
            // $user = $request->all();
            // Auth::login($user);
            //$session_id = Session::getid();
            //Session::start();
            //Log::info('-------------> session_id '.$session_id);

            return $this->sendResponse('', 'Sign in Sucessed!');
        }
        
        return $this->sendError('Sign in Failed!');
    }

    public function userinfo(Request $request) 
    {
        $key =  $request->session()->get('user');//Session::get('userName');
        //$request->session()->keep(['loginCheck', 'userName']);
        Log::info('User Info -------------> '.$request->session()->get('user'));
        //Log::info('User Info -------------> '.$key);
        //$data = $request->session()->all();

        return $this->sendResponse($key, 'User Detail');
    }

    public function logout(Request $request) 
    {
        $request->session()->flush();
        return $this->sendResponse('', 'Sign out!');
    }
}
