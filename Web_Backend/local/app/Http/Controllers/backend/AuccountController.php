<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AuccountController extends Controller
{

	public function getLogin() {

		return View('backend.login');

	}
 
	public function postLogin(Request $request) {

		$validator = \Validator::make($request->all(), [
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
        	return redirect()->route('getLogin')->withErrors($validator);
        } else {

        	if(\Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('getSlide');
        	} else {
        	return redirect()->route('getLogin')->with('password' , '1');
        	}
        }
	}

  public function logout() {
     \Auth::logout();
    return redirect()->route('getSlide');
  }
}
