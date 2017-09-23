<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;

class LoginController extends Controller
{
    public function login()
    {
    	return View('auth.login');
    }

    public function postLogin(Request $request)
    {
    	if (Sentinel::authenticate($request->all())) {

                $slug = Sentinel::getUser()->roles()->first()->slug;

                if ($slug == 'manager' || $slug == 'salesman')
                    return redirect('/home');
                elseif($slug == 'admin')
                    return redirect()->route('admin');
        }else{
            
            return redirect()->back();
        }

    }

    public function logout()
    {
    	Sentinel::logout();

    	return redirect('/');
    }
}
