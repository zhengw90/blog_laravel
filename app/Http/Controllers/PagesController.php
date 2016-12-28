<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function getAbout(){
		$companyName = "Code Execut"; 
		$isUserRegistered = true;
		
		$users = array("Renato", "Eric", "John", "Samantha");
		
		
		return view('pages.about')
				->with("name1",$companyName)
				->with("isUserRegistered",$isUserRegistered)
				->with("users", $users);
	}
		
	public function getContact(){
		return view('pages.contact');
	}
	
}