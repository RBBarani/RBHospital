<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    public function loginForm()
    {
      return view('login');
    }
    
    public function login(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->intended(route('admin.appointments'));
      }
	  return redirect()->back()->withErrors(['password' => 'Invalid Credentials']);
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
