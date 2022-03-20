<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DoctorLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:doctor', ['except' => ['logout']]);
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
      if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->intended(route('doctor.appointments'));
      } 
      return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
    }
    
    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/doctor');
    }
}
