<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function register_form()
    {
        if(Session::has('user'))
        {
            return redirect('/profile');
        }
        else
        {
            return view('auth.register');
        }
       
    }

    public function register(Request $request)
    {
        //check if email already existing
        $found = User::where('email', $request->email)->first();
        if(!$found)
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = sha1($request->password);
            $user->role_id = 2;
            $user->save();

            return "Account Registration Successful!";
        }
        else
        {
            return "Email Already Exist!";
        }

    }

    public function login_form(){

        if(Session::has('user'))
        {
            return redirect('/profile');
        }
        else
        {
            return view('auth.login');
        }
    }

    public function login(Request $request){

        $found = User::where('email', $request->email)
            ->where('password', sha1($request->password))->first();
        
        if($found)
        {
            Session::put('user', $found);
            return redirect('/profile');
        }
        else
        {
            return view('auth.login-response', 
            [
                'error' => 'Incorrect Email or Password'
            ]);
        }

    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/login');
    }

    public function not_clicked()
    {
        return redirect('/profile');
    }

}
