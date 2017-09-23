<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
    	return View('auth.forgotpassword');
    }

    public function postforgotPassword(Request $request)
    {
    	$user = User::whereEmail($request->email)->first();

    	$sentinelUser = Sentinel::findById($user->id);

    	if (count($user) == 0) {
    		return redirect()->back();
    	}

    	$reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);

    	$this->sendEmail($user, $reminder->code);

    	return redirect()->back();
    }

    public function resetPassword($email, $resetCode)
    {
    	$user = User::byEmail($email);

    	$sentinelUser = Sentinel::findById($user->id);

    	if ($reminder = Reminder::exists($sentinelUser)) {
    		if ($resetCode == $reminder->code)
    			return View('auth.reset-password');
    			else
    				return redirect('/');
    	}else{

    		return redirect('/');
    	}
    }

    public function PostResetPassword(Request $request, $email, $resetCode)
    {
    	$this->validate($request, array(

    			'password' => 'confirmed|required|min:6|max:20',
    			'password_confirmation' => 'required|min:6|max:20'
    	));

    	$user = User::byEmail($email);

    	$sentinelUser = Sentinel::findById($user->id);

    	if ($reminder = Reminder::exists($sentinelUser)) {
    		if ($resetCode == $reminder->code){

    			Reminder::complete($sentinelUser, $resetCode, $request->password);

    			return redirect('/');

    	     }else
    			return redirect('/');
    	}else{

    		return redirect('/');
    	}
    }

    private function sendEmail($user, $code)
    {
    	Mail::send('emails.forget-password', [

    		'user' => $user,
    		'code' => $code

    	], function($message) use ($user) {

    		$message->to($user->email);

    		$message->subject("Hello $user->name, reset your password");
    	});
    }
}
