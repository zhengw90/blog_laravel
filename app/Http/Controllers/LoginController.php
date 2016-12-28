<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;


class LoginController extends Controller
{
    public function login()
    {
    	return view('authentication.login');
    }
    
    public function postLogin(Request $request)
    {
      try {  
          	if(Sentinel::authenticate($request->all()))
            {           
                 if(Sentinel::getUser()->roles()->first()->slug == 'admin')
                 {
                      return redirect('/earnings');
                 } 
                 elseif (Sentinel::getUser()->roles()->first()->slug == 'manager')
                 {
                      return redirect('/tasks');
                 }
            }else{
                return redirect()->back()->with(['error'=>'Wrong credentials.']);
           
           }
      } catch ( ThrottlingException $e) {
          $delay = $e->getDelay();
           return redirect()->back()->with(['error'=>"You are banned for $delay second(s)."]);
      } catch ( NotActivatedException $e) {         
           return redirect()->back()->with(['error'=>"Your account is not activated!"]);
      }

}
    
    public function logout()
    {
    	Sentinel::logout();     	
    	return redirect('/login');    	 

    }
}
