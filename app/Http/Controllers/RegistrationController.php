<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Activation;
use App\User;
use Mail;

class RegistrationController extends Controller
{
    public function register()
    {
		return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
    	// $user = Sentinel::registerAndActivate($request->all());

        //return dd($request->all()); 
        $user = Sentinel::register($request->all());

        $activation = Activation::create($user);    //create a row in activation table

    	$role = Sentinel::findRoleBySlug('manager');
    	$role->users()->attach($user);

        $this->sendEmail($user, $activation->code);

    	//dd($user);
    	return redirect('/');
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.activation', [
                'user'=>$user,
                'code'=>$code
            ], function($message) use ($user){
                $message->to($user->email);
                $message->subject("Hello $user->first_name activate your account.");
            });
    }
}
