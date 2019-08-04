<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct() {

    }
    public function getLogin() {
    	return view('auth.auth.login');
    }
    public function postLogin(Request $request) {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required'=>'Yều cầu nhập',
                'password.required'=>'Yều cầu nhập',
            ]
        );
    	$credentials = $request->only('username', 'password');
    	if (Auth::attempt($credentials)) {
            return redirect()->route('admin.cat.index');
        } else {
        	return redirect()->route('auth.auth.login')->with('msg','Sai user hoặc pass');
        }
    }
    public function logout(){
    	Auth::logout();
    	return redirect()->route('bstory.story.index');
    }
}
