<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Sentinel;
use Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword() {
        return view('authentication.forgot-password');
    }

    public function postForgotPassword(Request $request) {
        $user = User::whereEmail($request->email)->first();
        if(count($user)== 0)
            return redirect()->back()->with([
                'success' => 'Reset code was sent to your email.'
            ]);
        $sentinelUser = Sentinel::findById($user->id);
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);

        $this->sendEmail($user,$reminder->code);
        return redirect()->back()->with(['success' => 'Reset code was sent to your email.']);
    }

    public function resetPassword($email, $resetCode)
    {
        $user = User::byEmail($email);
        $sentinelUser =Sentinel::findById($user->id);

        if(count($user)==0)
            about(404);

        if($reminder = Reminder::exists($sentinelUser)) {
            if($resetCode==$reminder->code)
                        return view('authentication.reset-password');
            else
                return redirect('/');
        }  else {
                return redirect('/');
        }

        //return $user;
    }

    public function postResetPassword(Request $request, $email, $resetCode)
    {
        $this->validate($request, [
            'password' => 'confirmed|required|min:5|max:10',
            'password_confirmation' => 'required|min:5|max:10'
        ]);

        $user = User::byEmail($email);
        $sentinelUser =Sentinel::findById($user->id);

        if(count($user)==0)
            about(404);

        if($reminder = Reminder::exists($sentinelUser)) {
            if($resetCode==$reminder->code) {
                Reminder::complete($sentinelUser, $resetCode, $request->password);
                return redirect('/login')->with('success', 'Please login');
            } else  {
                return redirect('/');
            }
        }  else {
                return redirect('/');
        }
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot-password', [
          'user' => $user,
          'code' => $code
        ], function($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->first_name, reset your password.");
        });
    }
}
